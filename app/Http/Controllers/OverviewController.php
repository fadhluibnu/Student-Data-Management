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
            return view('overview-admin', [
                'title' => 'admin'
            ]);
        };

        // $tahunUjian = TahunUjian::where('id_sekolah', auth()->user()->sekolah->id_sekolah)->get();
        // $jenisUjian = JenisUjian::where('id_sekolah', auth()->user()->sekolah->id_sekolah)->get();
        $tahunUjian = TahunUjian::all();
        $jenisUjian = JenisUjian::all();

        $selectTh = [];
        $selectJns = [];
        $jns = '';
        $month = date('m');

        // Tahun Ajaran
        $dateTh = date('m') == 06 ? date("Y") . date("Y") + 1 : date("Y") - 1 . date("Y");
        // return $dateTh;
        foreach ($tahunUjian as $th) {
            if ($th->slug == $dateTh) {
                $selectTh[] = [
                    'id' => $th->id,
                    'tahun' => $th->tahun,
                    'slug' => $th->slug
                ];
            }
        }

        // Jenis Ujian
        if ($month >= 1 & $month <= 3) {
            $jns = 'uts2';
        } elseif ($month > 3 & $month <= 6) {
            $jns = 'uas2';
        } elseif ($month > 6 & $month <= 9) {
            $jns = 'uts1';
        } else {
            $jns = 'uas1';
        }
        foreach ($jenisUjian as $js) {
            if ($js->slug == $jns) {
                $selectJns[] = [
                    'id' => $js->id,
                    'ujian' => $js->ujian,
                    'slug' => $js->slug
                ];
            }
        }

        // return $selectTh;
        if (auth()->user()->role_id == 2) {
            $user_log = User::where('id', auth()->user()->id)->get();

            $nilaisiswa = DataNilaiSiswa::whereHas('user', function (Builder $query) {
                $query->where('sekolah_id', auth()->user()->sekolah_id)
                    ->where('kelas_id', auth()->user()->walikelas_id)
                    ->where('role_id', 3);
            });
            if (request('jenis_ujian') || request('tahun_ujian')) {
                $nilaisiswa = $nilaisiswa->filter(request(['jenis_ujian', 'tahun_ujian']))->get();
            } else {
                $nilaisiswa = $nilaisiswa->where('jenis_ujian_id', $selectJns[0]['id'])->where('tahun_ujian_id', $selectTh[0]['id'])->get();
            }

            $user = User::where('sekolah_id', auth()->user()->sekolah_id)->where('role_id', 3)->where('kelas_id', auth()->user()->walikelas_id)->get();
            $user = collect($user)->sortBy('name')->values()->all();

            $datasiswa = [];
            $i = 0;

            foreach ($user as $u) {
                $datasiswa[] = [
                    'id' => null,
                    'user_id' => $u->id,
                    'nis' => $u->nis,
                    'name' => $u->name,
                    'pkn' => 0,
                    'mtk' => 0,
                    'ing' => 0,
                    'ind' => 0,
                    'jawa' => 0,
                    'pjok' => 0,
                    'ipa' => 0,
                    'ips' => 0,
                    'status' => 'kosong'
                ];
                foreach ($nilaisiswa as $nilai) {
                    if ($nilai->user_id == $u->id) {
                        $datasiswa[$i]['id'] = $nilai->id;
                        $datasiswa[$i]['pkn'] = $nilai->pkn;
                        $datasiswa[$i]['mtk'] = $nilai->mtk;
                        $datasiswa[$i]['ing'] = $nilai->ing;
                        $datasiswa[$i]['ind'] = $nilai->ind;
                        $datasiswa[$i]['jawa'] = $nilai->ind;
                        $datasiswa[$i]['pjok'] = $nilai->ind;
                        $datasiswa[$i]['ipa'] = $nilai->ind;
                        $datasiswa[$i]['ips'] = $nilai->ind;
                    }
                }
                if ($datasiswa[$i]['pkn'] != 0 && $datasiswa[$i]['mtk'] != 0 && $datasiswa[$i]['ing'] != 0 && $datasiswa[$i]['ind'] != 0) {
                    $datasiswa[$i]['status'] = 'terisi';
                }
                $i++;
            }

            return view('overview-guru', [
                'title' => $user_log[0]['name'],
                'user' => $user_log,
                'jenis' => $jenisUjian,
                'selectJns' => $selectJns,
                'tahun' => $tahunUjian,
                'selectTh' => $selectTh,
                'data' => $datasiswa
            ]);
        };

        if (auth()->user()->role_id == 3) {
            // return $selectJns;

            $user = User::where('id', auth()->user()->id)->get();

            $nilai = DataNilaiSiswa::whereHas('user', function (Builder $query) {
                $query->where('sekolah_id', auth()->user()->sekolah_id)
                    ->where('role_id', 3)
                    ->where('kelas_id', auth()->user()->kelas_id);
            });

            if (request('jenis_ujian') || request('tahun_ujian')) {
                $nilai = $nilai->filter(request(['jenis_ujian', 'tahun_ujian']))->get();
            } else {
                $nilai = $nilai->where('jenis_ujian_id', $selectJns[0]['id'])->where('tahun_ujian_id', $selectTh[0]['id'])->get();
            }
            $dataNilai = [];
            $hScore = [];
            $i = 0;

            foreach ($nilai as $n) {
                $dataNilai[] = [
                    'user_id' => $n->user_id,
                    'nis' => $n->user->nis,
                    'name' => $n->user->name,
                    'avg' => round(collect([$n->pkn, $n->mtk, $n->ing, $n->ind, $n->jawa, $n->pjok, $n->ipa, $n->ips])->avg()),
                    'hScore' => collect([$n->pkn, $n->mtk, $n->ing, $n->ind, $n->jawa, $n->pjok, $n->ipa, $n->ips])->max(),
                    'pkn' => $n->pkn,
                    'mtk' => $n->mtk,
                    'ing' => $n->ing,
                    'ind' => $n->ind,
                    'jawa' => $n->jawa,
                    'pjok' => $n->pjok,
                    'ipa' => $n->ipa,
                    'ips' => $n->ips,
                ];
                $i++;
            }
            $dataNilai = collect($dataNilai)->sortByDesc('avg')->values()->all();

            // return $dataNilai;

            return view('overview-siswa', [
                'title' => $user[0]['name'],
                'data' => $dataNilai,
                'jenis' => $jenisUjian,
                'selectJns' => $selectJns,
                'tahun' => $tahunUjian,
                'selectTh' => $selectTh,
                'user' => $user
            ]);




            // $role = User::where('id', auth()->user()->id)->get();

            // if (request('jenis_ujian') || request('tahun_ujian')) {
            //     $getNilai = DataNilaiSiswa::where('user_id', auth()->user()->id)->filter(request(['jenis_ujian', 'tahun_ujian']))->get();

            //     $this->getRank = DataNilaiSiswa::whereHas('user', function (Builder $query) {
            //         $query->where('sekolah_id', auth()->user()->sekolah_id)
            //             ->where('kelas_id', auth()->user()->kelas_id)
            //             ->where('role_id', auth()->user()->role_id);
            //     })->filter(request(['jenis_ujian', 'tahun_ujian']))->orderBy("id", 'desc')->limit(DB::table('users')->where('sekolah_id', auth()->user()->sekolah_id)
            //         ->where('kelas_id', auth()->user()->kelas_id)
            //         ->where('role_id', auth()->user()->role_id)
            //         ->count())->get();
            // } else {
            //     $getNilai = DataNilaiSiswa::where('user_id', auth()->user()->id)->whereHas('tahun_ujian', function (Builder $query,) {
            //         $query->where('slug', date('m') == 06 ? date("Y") . date("Y") + 1 : date("Y") - 1 . date("Y"));
            //     })->orderBy('id', 'desc')->limit(1)->get();


            //     $this->getRank = DataNilaiSiswa::whereHas('user', function (Builder $query) {
            //         $query->where('sekolah_id', auth()->user()->sekolah_id)
            //             ->where('kelas_id', auth()->user()->kelas_id)
            //             ->where('role_id', auth()->user()->role_id);
            //     })->whereHas('tahun_ujian', function (Builder $query,) {
            //         $query->where('slug', date('m') == 06 ? date("Y") . date("Y") + 1 : date("Y") - 1 . date("Y"));
            //     })->orderBy("id", 'desc')->limit(DB::table('users')->where('sekolah_id', auth()->user()->sekolah_id)
            //         ->where('kelas_id', auth()->user()->kelas_id)
            //         ->where('role_id', auth()->user()->role_id)
            //         ->count())->get();
            // }

            // if (count($getNilai) == 1) {

            //     foreach ($getNilai as $key) {
            //         $average[] = $key->mtk;
            //         $average[] = $key->pkn;
            //         $average[] = $key->ing;
            //         $average[] = $key->ind;
            //     }
            //     sort($average);
            //     $arrLength = count($average);
            //     $this->scoreHigh = $average[$arrLength - 1];

            //     $ravg = collect($average)->avg();
            //     $this->result_average = round($ravg);


            //     // mendapatkan rangking kelas
            //     foreach ($this->getRank as $item) {
            //         $avgRank[] = ["user_id" => $item->user_id, "average" => collect($item->pkn, $item->mtk, $item->ing, $item->ind)->avg()];
            //     }

            //     $collect = collect($avgRank)->sortByDesc('average');
            //     $dataAvgRank = $collect->values()->all();

            //     $indx = 1;
            //     for ($i = 0; $i <= count($dataAvgRank) - 1; $i++) {
            //         if ($dataAvgRank[$i]['user_id'] == auth()->user()->id) {
            //             $this->rank_student = $indx;
            //         }
            //         $indx++;
            //     }
            // } else {
            //     $getNilai = false;
            //     $this->scoreHigh = false;
            //     $this->result_average = false;
            //     $this->rank_student = false;
            // };
        };

        // $this->getTahunUjian = TahunUjian::where('id_sekolah', auth()->user()->sekolah->id_sekolah)->get();
        // $this->getJeniUjian = JenisUjian::where('id_sekolah', auth()->user()->sekolah->id_sekolah)->get();
        // foreach ($role as $key) {
        //     $nama = $key->name;
        // }

        // return view('overview', [
        //     'role' => $role,
        //     'title' => $nama,
        //     'avgStudent' => $this->result_average,
        //     'scoreHigh' => $this->scoreHigh,
        //     'allScore' => $getNilai,
        //     'thnUjian' => $this->getTahunUjian,
        //     'jnsUjian' => $this->getJeniUjian,
        //     'rank' => $this->rank_student
        // ]);
    }
}
