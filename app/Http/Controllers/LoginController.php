<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->with('loginErr', "Login failed!!");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function regist()
    {
        if (request('u') == null) {
            return redirect('/login')->with('regist', 'Terjadi kesalahan');
        }

        return view('auth.registrasi', [
            'title' => "Registrasi",
        ]);
    }

    public function registrasi(Request $request)
    {
        $validateSekolah = $request->validate([
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required'
        ]);
        $idSekolah = date('d') . 0 . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

        $validateUser = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'alamat' => 'required',
            'role_id' => 'required'
        ]);
        Sekolah::create([
            'id_sekolah' => $idSekolah,
            'nama' => $validateSekolah['nama_sekolah'],
            'alamat_sekolah' => $validateSekolah['alamat_sekolah']
        ]);

        $getId = DB::table('sekolahs')->select('id')->where('id_sekolah', $idSekolah)->get();

        foreach ($getId as $id) {
            $sekolah_id = $id->id;
        }

        User::create([
            'name' => $validateUser['name'],
            'email' => $validateUser['email'],
            'password' => Hash::make($validateUser['password']),
            'alamat' => $validateUser['alamat'],
            'sekolah_id' => $sekolah_id,
            'role_id' => $validateUser['role_id']
        ]);

        return redirect('/');
    }
}
