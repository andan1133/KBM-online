<?php

namespace App\Http\Controllers;

use App\Mata_Pelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matapelajaran = Mata_Pelajaran::all();
        $data = [
            'matapelajaran' => $matapelajaran
        ];

        return view('matapelajaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MataPelajaran.create');
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
            "name" => "required|string",

        ]);

        $matapelajaran = new Mata_Pelajaran();
        $matapelajaran->nama = $request->name;
        $matapelajaran->Save();


        return redirect()->route('mp.index');
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
        $matapelajaran = Mata_Pelajaran::find($id);

        $data = [
            'mp' => $matapelajaran
        ];
        return view('MataPelajaran.edit', $data);
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
            "name" => "required|string",

        ]);

        $matapelajaran = Mata_Pelajaran::find($id);
        $matapelajaran->nama = $request->name;
        $matapelajaran->Save();


        return redirect()->route('mp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mata_Pelajaran::destroy($id);

        return redirect()->back();
    }
}
