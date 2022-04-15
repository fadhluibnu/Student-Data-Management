<?php

namespace App\Http\Controllers;

use App\Models\DataNilaiSiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class OverviewController extends Controller
{
    public $result_average;
    public $arrLength;
    public $scoreHigh;
    public $getNilai;
    public function index()
    {
        $average = [];
        if (auth()->user()->role_id == 1) {
            $role = User::where('id', auth()->user()->id)->get();
        };

        if (auth()->user()->role_id == 2) {
            $role = User::where('id', auth()->user()->id)->get();
        };

        if (auth()->user()->role_id == 3) {
            $role = User::where('id', auth()->user()->id)->get();

            // $getNilai = DB::table('data_nilai_siswas')
            //     ->select('pkn', 'mtk', 'ing', 'ind')->where('id', auth()->user()->id)->get();
            $this->getNilai = DataNilaiSiswa::where('id', auth()->user()->id)->get();

            foreach ($this->getNilai as $key) {
                $average[] = $key->mtk;
                $average[] = $key->pkn;
                $average[] = $key->ing;
                $average[] = $key->ind;
            }
            sort($average);
            $arrLength = count($average);
            $this->scoreHigh = $average[$arrLength - 1];

            $ravg = collect($average)->avg();
            $this->result_average = round($ravg);
        };

        foreach ($role as $key) {
            $nama = $key->name;
        }

        return view('overview', [
            'role' => $role,
            'title' => $nama,
            'avgStudent' => $this->result_average,
            'scoreHigh' => $this->scoreHigh,
            'allScore' => $this->getNilai
        ]);
    }
}
