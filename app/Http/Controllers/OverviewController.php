<?php

namespace App\Http\Controllers;

use App\Models\DataNilaiSiswa;
use App\Models\JenisUjian;
use App\Models\TahunUjian;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class OverviewController extends Controller
{
    public $result_average;
    public $arrLength;
    public $scoreHigh;
    public $getNilai;
    public $getTahunUjian;
    public $getJeniUjian;
    public $getRank;
    public $rank_student;
    public function index()
    {
        $average = [];
        $avgRank = [];
        if (auth()->user()->role_id == 1) {
            $role = User::where('id', auth()->user()->id)->get();
        };

        if (auth()->user()->role_id == 2) {
            $role = User::where('id', auth()->user()->id)->get();
        };

        if (auth()->user()->role_id == 3) {

            $role = User::where('id', auth()->user()->id)->get();
            $year = date("Y");
            $nextYear = $year + 1;

            if (request('jenis_ujian') || request('tahun_ujian')) {
                $this->getNilai = DataNilaiSiswa::where('user_id', auth()->user()->id)->filter(request(['jenis_ujian', 'tahun_ujian']))->get();

                $this->getRank = DataNilaiSiswa::whereHas('user', function (Builder $query) {
                    $query->where('sekolah_id', auth()->user()->sekolah_id)
                        ->where('kelas_id', auth()->user()->kelas_id)
                        ->where('role_id', auth()->user()->role_id);
                })->filter(request(['jenis_ujian', 'tahun_ujian']))->orderBy("id", 'desc')->limit(DB::table('users')->where('sekolah_id', auth()->user()->sekolah_id)
                    ->where('kelas_id', auth()->user()->kelas_id)
                    ->where('role_id', auth()->user()->role_id)
                    ->count())->get();
            } else {
                $this->getNilai = DataNilaiSiswa::where('user_id', auth()->user()->id)->whereHas('tahun_ujian', function (Builder $query,) {
                    $query->where('slug', date('m') == 06 ? date("Y") . date("Y") + 1 : date("Y") - 1 . date("Y"));
                })->orderBy('id', 'desc')->limit(1)->get();


                $this->getRank = DataNilaiSiswa::whereHas('user', function (Builder $query) {
                    $query->where('sekolah_id', auth()->user()->sekolah_id)
                        ->where('kelas_id', auth()->user()->kelas_id)
                        ->where('role_id', auth()->user()->role_id);
                })->whereHas('tahun_ujian', function (Builder $query,) {
                    $query->where('slug', date('m') == 06 ? date("Y") . date("Y") + 1 : date("Y") - 1 . date("Y"));
                })->orderBy("id", 'desc')->limit(DB::table('users')->where('sekolah_id', auth()->user()->sekolah_id)
                    ->where('kelas_id', auth()->user()->kelas_id)
                    ->where('role_id', auth()->user()->role_id)
                    ->count())->get();
            }

            $this->getTahunUjian = TahunUjian::all();
            $this->getJeniUjian = JenisUjian::all();

            if (count($this->getNilai) == 1) {

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


                // mendapatkan rangking kelas
                foreach ($this->getRank as $item) {
                    $avgRank[] = ["user_id" => $item->user_id, "average" => collect($item->pkn, $item->mtk, $item->ing, $item->ind)->avg()];
                }

                $collect = collect($avgRank)->sortByDesc('average');
                $dataAvgRank = $collect->values()->all();

                $indx = 1;
                for ($i = 0; $i <= count($dataAvgRank) - 1; $i++) {
                    if ($dataAvgRank[$i]['user_id'] == auth()->user()->id) {
                        $this->rank_student = $indx;
                    }
                    $indx++;
                }
            } else {
                $this->getNilai = false;
                $this->scoreHigh = false;
                $this->result_average = false;
                $this->rank_student = false;
            };
        };

        foreach ($role as $key) {
            $nama = $key->name;
        }

        return view('overview', [
            'role' => $role,
            'title' => $nama,
            'avgStudent' => $this->result_average,
            'scoreHigh' => $this->scoreHigh,
            'allScore' => $this->getNilai,
            'thnUjian' => $this->getTahunUjian,
            'jnsUjian' => $this->getJeniUjian,
            'rank' => $this->rank_student
        ]);
    }
}
