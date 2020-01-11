<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Jadwal;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $absen = Absen::find($id);
        $jadwal = Jadwal::where('id_absen', $id)->first();

        $data = [
            'absen' => $absen,
            'jadwal' => $jadwal
        ];
        return view('absen.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "jumlah" => "required|numeric",
            "hadir" => "required|numeric",
            "sakit" => "required|numeric",
            "izin" => "required|numeric",
            "alfa" => "required|numeric",
            "description" => "required|string"
        ]);

        $absen = Absen::find($id);
        $absen->jumlah = $request->jumlah;
        $absen->hadir = $request->hadir;
        $absen->sakit = $request->sakit;
        $absen->izin = $request->izin;
        $absen->alfa = $request->alfa;
        $absen->save();

        $jadwal = Jadwal::where('id_absen', $id)->first();
        $jadwal->deskripsi = $request->description;
        $jadwal->save();

        return redirect()->route('jadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
