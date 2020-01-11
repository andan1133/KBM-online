<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use App\Jadwal;
use App\Kelas;
use App\Mata_Pelajaran;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $object = [];
        $class = [];

        $kelas = Kelas::all();
        if ($kelas) {
            $oldNameClass = "";
            foreach ($kelas as $key => $value) {
                $nameClass = explode('-', $value->nama);
                if ($nameClass[0] != $oldNameClass) {
                    $object[$key] = $nameClass[0];
                    $oldNameClass = $nameClass[0];
                } else {
                    $oldNameClass = $nameClass[0];
                }
            }

            foreach ($object as $key => $value) {
                $getClass = Kelas::where('nama', 'like', '%' . $value . '%')->get();
                $getClass->map(function ($item) {
                    if (Auth::user()->status == 1) {
                        $item->schedule = Jadwal::where('id_guru', Auth::user()->id)->where('id_kelas', $item->id)->where('tgl', 'LIKE', '%' . Carbon::now()->format('d-m-Y') . '%')->get();
                    } else {
                        $item->schedule = Jadwal::where('id_kelas', $item->id)->where('tgl', 'LIKE', '%' . Carbon::now()->format('d-m-Y') . '%')->get();
                    }
                    $item->schedule->map(function ($itemSub) {
                        $itemSub->user = User::find($itemSub->id_guru);
                        $itemSub->kelas = Kelas::find($itemSub->id_kelas);
                        $itemSub->mp = Mata_Pelajaran::find($itemSub->id_pelajaran);
                        $itemSub->absen = Absen::find($itemSub->id_absen);
                        $itemSub->absen->guru = User::find($itemSub->id_guru);
                        return $itemSub;
                    });
                    return $item;
                });
                $class[$key] = $getClass;
            }
        }

        $data = [
            'header' => $object,
            'class' => $class,
        ];

        return view('home', $data);
    }
}
