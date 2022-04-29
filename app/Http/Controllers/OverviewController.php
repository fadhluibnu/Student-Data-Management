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
    // public $getNilai;
    public $getTahunUjian;
    public $getJeniUjian;
    public $getRank;
    public $rank_student;
    public function index()
    {
        $getNilai = null;
        $average = [];
        $avgRank = [];
        if (auth()->user()->role_id == 1) {
            $role = User::where('id', auth()->user()->id)->get();
        };

        if (auth()->user()->role_id == 2) {
            $role = User::where('id', auth()->user()->id)->get();
            $getNilai = DataNilaiSiswa::whereHas('user', function (Builder $query) {
                $query->where('sekolah_id', auth()->user()->sekolah_id)
                    ->where('kelas_id', auth()->user()->walikelas_id)
                    ->where('role_id', 3);
            })->whereHas('tahun_ujian', function (Builder $query,) {
                $query->where('slug', date('m') == 06 ? date("Y") . date("Y") + 1 : date("Y") - 1 . date("Y"));
            });
            if (request('jenis_ujian') || request('tahun_ujian')) {
                $getNilai = $getNilai->filter(request(['jenis_ujian', 'tahun_ujian']))->get();
                // return $getNilai;
            } else {
                $getNilai = $getNilai->orderBy("id", 'desc')->limit(DB::table('users')->where('sekolah_id', auth()->user()->sekolah_id)
                    ->where('kelas_id', auth()->user()->walikelas_id)
                    ->where('role_id', 3)
                    ->count())->get();

                // return $getNilai[0]->jenis_ujian->ujian;
            }
            $siswa = [];
            foreach ($getNilai as $key) {
                $siswa[] = [
                    'nama' => $key->user->name,
                    'mtk' => $key->mtk,
                    'ing' => $key->ing,
                    'ind' => $key->ind,
                    'pkn' => $key->pkn,
                    'jenis_ujian' => $key->jenis_ujian->ujian,
                    'jenis_ujian_slug' => $key->jenis_ujian->slug,
                    'tahun_ujian' => $key->tahun_ujian->tahun,
                    'tahun_ujian_slug' => $key->tahun_ujian->slug
                ];
            }
            // return $siswa;
            $siswa = collect($siswa);
            $getNilai = $siswa->sortBy(['nama', 'asc']);
            if (count($getNilai) == 0) {
                $getNilai = false;
                $this->scoreHigh = false;
                $this->result_average = false;
                $this->rank_student = false;
            }
            // return $getNilai[0]['nama'];
        };

        if (auth()->user()->role_id == 3) {
            $role = User::where('id', auth()->user()->id)->get();

            if (request('jenis_ujian') || request('tahun_ujian')) {
                $getNilai = DataNilaiSiswa::where('user_id', auth()->user()->id)->filter(request(['jenis_ujian', 'tahun_ujian']))->get();

                $this->getRank = DataNilaiSiswa::whereHas('user', function (Builder $query) {
                    $query->where('sekolah_id', auth()->user()->sekolah_id)
                        ->where('kelas_id', auth()->user()->kelas_id)
                        ->where('role_id', auth()->user()->role_id);
                })->filter(request(['jenis_ujian', 'tahun_ujian']))->orderBy("id", 'desc')->limit(DB::table('users')->where('sekolah_id', auth()->user()->sekolah_id)
                    ->where('kelas_id', auth()->user()->kelas_id)
                    ->where('role_id', auth()->user()->role_id)
                    ->count())->get();
            } else {
                $getNilai = DataNilaiSiswa::where('user_id', auth()->user()->id)->whereHas('tahun_ujian', function (Builder $query,) {
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

            if (count($getNilai) == 1) {

                foreach ($getNilai as $key) {
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
                $getNilai = false;
                $this->scoreHigh = false;
                $this->result_average = false;
                $this->rank_student = false;
            };
        };

        $this->getTahunUjian = TahunUjian::all();
        $this->getJeniUjian = JenisUjian::all();
        foreach ($role as $key) {
            $nama = $key->name;
        }

        return view('overview', [
            'role' => $role,
            'title' => $nama,
            'avgStudent' => $this->result_average,
            'scoreHigh' => $this->scoreHigh,
            'allScore' => $getNilai,
            'thnUjian' => $this->getTahunUjian,
            'jnsUjian' => $this->getJeniUjian,
            'rank' => $this->rank_student
        ]);
    }
}
