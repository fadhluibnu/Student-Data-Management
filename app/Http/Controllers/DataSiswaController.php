<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = User::where('sekolah_id', auth()->user()->sekolah_id)->where('role_id', 3)->get();
        return view('admin.data', [
            'title' => 'Tambah Data Siswa',
            'link' => 'datasiswa',
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::where('id_sekolah', auth()->user()->sekolah->id_sekolah)->get();
        $kelas = collect($kelas)->sortBy('kelas')->values()->all();

        return view('admin.data-create', [
            'title' => 'Tambah Data Siswa',
            'kelas' => $kelas,
            'link' => 'datasiswa'
        ]);
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
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User',
            'password' => 'required|min:8',
            'nis' => 'required|unique:App\Models\User',
            'alamat' => 'required',
            'sekolah_id' => 'required',
            'role_id' => 'required',
            'kelas_id' => 'required'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);

        return redirect('/datasiswa')->with('success', 'Data Berhasil Ditambahkan!');
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
        $siswa = User::where('id', $id)->where('sekolah_id', auth()->user()->sekolah_id)->where('role_id', 3)->get();
        $kelas = Kelas::where('id_sekolah', auth()->user()->sekolah->id_sekolah)->get();

        if (count($siswa) == 0) {
            return redirect('/datasiswa')->with('fail', 'Terjadi Kesalahan, Data Tidak Ditemukan!');
        };

        return view('admin.data-create', [
            'title' => 'Edit Data Siswa',
            'siswa' => $siswa,
            'link' => 'datasiswa/' . $id,
            'kelas' => collect($kelas)->sortBy('kelas')->values()->all(),
            'mode' => 'datasiswa'
        ]);
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
        $validate = $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required'
        ]);
        if ($request->password != null) {
            $validate += ['password' => 'required|min:8'];
            $validate['password'] = Hash::make($validate['password']);
        };

        User::where('id', $id)->update($validate);
        return redirect('/datasiswa')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/datasiswa')->with('success', 'Data Berhasil Di Hapus');
    }
}
