<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Jadwal;
use App\Kelas;
use App\Mata_Pelajaran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->status == 1) {
            $jadwal = Jadwal::where('id_guru', Auth::user()->id)->get();
        } else {
            $jadwal = Jadwal::all();
        }
        $jadwal->map(function ($item) {
            $item->user = User::find($item->id_guru);
            $item->kelas = Kelas::find($item->id_kelas);
            $item->mp = Mata_Pelajaran::find($item->id_pelajaran);
            $item->absen = Absen::find($item->id_absen);
            $item->absen->guru = User::find($item->id_guru);
        });

        $data = [
            'jadwal' => $jadwal
        ];

        return view('jadwal.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = Kelas::all();
        $mp = Mata_Pelajaran::all();
        $user = User::where('status', 1)->get();

        $data = [
            'class' => $class,
            'mp' => $mp,
            'user' => $user
        ];

        return view('jadwal.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "guru" => "required",
            "mata_pelajaran" => "required",
            "kelas" => "required",
            "date" => "required",
        ]);

        $dateConverter = explode("/", $request->date);
        $dateToRoman = $this->numberToRomanRepresentation($dateConverter[1]);

        $absen = new Absen();
        $absen->id_guru = $request->guru;
        $absen->tgl = $dateConverter[0];
        $absen->status = 0;
        $absen->save();

        $schedule = new Jadwal();
        $schedule->id_guru = $request->guru;
        $schedule->tgl = $dateConverter[0] . '/' . $dateToRoman;
        $schedule->id_kelas = $request->kelas;
        $schedule->id_pelajaran = $request->mata_pelajaran;
        $schedule->id_absen = $absen->id;
        $schedule->save();

        return redirect()->route('jadwal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $status)
    {
        $absen = Absen::find($id);
        $absen->status = $status;
        $absen->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jadwal, $absen)
    {
        Jadwal::destroy($jadwal);
        Absen::destroy($absen);
        return redirect()->back();
    }

    function numberToRomanRepresentation($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}
