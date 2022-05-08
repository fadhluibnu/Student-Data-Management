<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getKelas = WaliKelas::where('id_sekolah', auth()->user()->sekolah->id_sekolah)->get();
        $getWalas = User::where('sekolah_id', auth()->user()->sekolah_id)->get();

        $walas  = collect($getWalas)->whereNotIn('role_id', 1)->values()->all();
        $kelas =  collect($getKelas)->sortBy('walas')->values()->all();

        return view('admin.data', [
            'title' => "Data Kelas",
            'link' => 'datakelas',
            'kelas' => $kelas,
            'walas' => $walas
        ]);
    }

    /**
     * 0Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tambahKelas' => 'required',
            'id_sekolah' => 'required'
        ]);

        WaliKelas::create([
            'id_sekolah' => $validate['id_sekolah'],
            'walas' => $validate['tambahKelas'],
            'slug' => auth()->user()->sekolah->id_sekolah . str_replace(' ', '', $validate['tambahKelas'])
        ]);
        Kelas::create([

            'id_sekolah' => $validate['id_sekolah'],
            'kelas' => $validate['tambahKelas'],
            'slug' => auth()->user()->sekolah->id_sekolah . str_replace(' ', '', $validate['tambahKelas'])
        ]);

        return redirect('/datakelas')->with('success', 'Kelas Berhasil Ditambahkan!!');
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
    public function update(Request $request, $id)
    {
        //
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
