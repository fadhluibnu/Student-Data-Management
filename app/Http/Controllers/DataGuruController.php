<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = User::where('sekolah_id', auth()->user()->sekolah_id)->where('role_id', 2)->get();
        return view('admin.data', [
            'title' => 'Data Guru',
            'link' => 'dataguru',
            'guru' => $guru,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $walas = WaliKelas::where('id_sekolah', auth()->user()->sekolah->id_sekolah)->get();
        $walas = collect($walas)->sortBy('walas')->values()->all();

        return view('admin.data-create', [
            'title' => 'Tambah Data Guru',
            'walas' => $walas,
            'link' => 'dataguru'
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
            'walikelas_id' => 'required|unique:users'
        ]);
        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);
        return redirect('/dataguru')->with('success', 'Data Berhasil Ditambahkan!');
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
        $user = User::where('id', $id)->where('sekolah_id', auth()->user()->sekolah_id)->where('role_id', 2)->get();

        if (count($user) == 0) {
            return redirect('/dataguru')->with('fail', 'Terjadi Kesalahan, Data Tidak Ditemukan!');
        };

        return view('admin.data-create', [
            'title' => 'title',
            'walas' => $user,
            'link' => 'dataguru',
            'id' => $id
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
            'alamat' => 'required'
        ]);

        if ($request->password != null) {
            $validate += ['password' => 'required|min:8'];
        };

        User::where('id', $id)->update($validate);

        return redirect('/dataguru')->with('success', 'Data Berhasil Diubah!');
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

        return redirect('/dataguru')->with('success', 'Data Berhasil Di Hapus');
    }

    public function messages()
    {
        return [
            'walikelas_id.unique:App\Models\User' => 'Kelas Tidak Tersedia'
        ];
    }
}
