<?php

namespace App\Http\Controllers;

use App\Models\JenisUjian;
use App\Models\TahunUjian;
use Illuminate\Http\Request;

class TahunJenisUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.data', [
            'title' => 'Tahun Jenis Ujian',
            'tahun' => 'Data Tahun Ujian',
            'jenis' => 'Data Jenis Ujian',
            'link' => 'datasiswa'
        ]);
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
        if ($request->table == 'tahun') {
            $validate = $request->validate([
                'tahun1' => 'required',
                'tahun2' => 'required'
            ]);
            TahunUjian::create([
                'id_sekolah' => auth()->user()->sekolah->id_sekolah,
                'tahun' => $validate['tahun1'] . ' - ' . $validate['tahun2'],
                'slug' => $validate['tahun1'] . $validate['tahun2']
            ]);
        }
        if ($request->table == 'jenis') {
            $validate = $request->validate([
                'tambahJenis' => 'required'
            ]);
            JenisUjian::create([
                'id_sekolah' => auth()->user()->sekolah->id_sekolah,
                'ujian' => $validate['tambahJenis'],
                'slug' => strtolower($validate['tambahJenis'])
            ]);
        }
        return redirect('/tahunjenis')->with('success', 'Data Berhasil Ditambahkan!');
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
