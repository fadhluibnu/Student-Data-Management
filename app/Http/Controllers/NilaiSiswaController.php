<?php

namespace App\Http\Controllers;

use App\Models\DataNilaiSiswa;
use App\Models\JenisUjian;
use App\Models\TahunUjian;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tahunUjian = TahunUjian::where('id_sekolah', auth()->user()->sekolah->id_sekolah)->get();
        // $jenisUjian = JenisUjian::where('id_sekolah', auth()->user()->sekolah->id_sekolah)->get();
        $tahunUjian = TahunUjian::all();
        $jenisUjian = JenisUjian::all();

        $selectTh = [];
        $selectJns = [];
        $dateTh = date('m') == 06 ? date("Y") . date("Y") + 1 : date("Y") - 1 . date("Y");
        $jns = '';
        $month = date('m');
        if ($month >= 1 & $month <= 3) {
            $jns = 'uts2';
        } elseif ($month > 3 & $month <= 6) {
            $jns = 'uas2';
        } elseif ($month > 6 & $month <= 9) {
            $jns = 'uts1';
        } else {
            $jns = 'uas1';
        }

        foreach ($tahunUjian as $th) {
            if ($th->slug == $dateTh) {
                $selectTh[] = [
                    'id' => $th->id,
                    'tahun' => $th->tahun,
                    'slug' => $th->slug
                ];
            }
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

        $nilaisiswa = DataNilaiSiswa::whereHas('user', function (Builder $query) {
            $query->where('sekolah_id', auth()->user()->sekolah_id)
                ->where('kelas_id', auth()->user()->walikelas_id)
                ->where('role_id', 3);
        });
        if (request('jenis_ujian') || request('tahun_ujian')) {
            $nilaisiswa = $nilaisiswa->filter(request(['jenis_ujian', 'tahun_ujian']))->get();
            $selectTh = TahunUjian::where('slug', request('tahun_ujian'))->get();
        } else {
            $nilaisiswa = $nilaisiswa->where('jenis_ujian_id', $selectJns[0]['id'])->where('tahun_ujian_id', $selectTh[0]['id'])->get();
        }

        $user = User::where('sekolah_id', auth()->user()->sekolah_id)->where('role_id', 3)->where('kelas_id', auth()->user()->walikelas_id)->get();
        $user = collect($user)->sortBy('name')->values()->all();

        $datasiswa = [];
        $i = 0;

        // return $selectTh;
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
                'status' => 'kosong',
                'tahun' => $selectTh[0],
                'jenis' => $selectJns[0]
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

        return view('admin.data', [
            'title' => 'Nilai Siswa',
            'link' => 'datasiswa',
            'data' => $datasiswa,
            'tahun' => collect($tahunUjian)->sortBy('tahun')->values()->all(),
            'jenis' => $jenisUjian,
            'selectTh' => $selectTh,
            'selectJns' => $selectJns
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!isset($_REQUEST['id']) || !isset($_REQUEST['tahun']) || !isset($_REQUEST['jenis'])) {
            return redirect('/nilaisiswa')->with('fail', "Terjadi Kesalahan!");
        }
        if ($_REQUEST['id'] == null || $_REQUEST['tahun'] == null || $_REQUEST['jenis'] == null) {
            return redirect('/nilaisiswa')->with('fail', "Terjadi Kesalahan!");
        }

        $tahun = TahunUjian::where('id', $_REQUEST['tahun'])->get();
        $jenis = JenisUjian::where('id', $_REQUEST['jenis'])->get();
        $siswa = User::where('id', $_REQUEST['id'])->where('sekolah_id', auth()->user()->sekolah_id)->where('role_id', 3)->where('kelas_id', auth()->user()->walikelas_id)->get();

        if ($siswa->count() == 0 || $tahun->count() == 0 || $jenis->count() == 0) {
            return redirect('/nilaisiswa')->with('fail', "Terjadi Kesalahan!");
        }
        // return $tahun;
        return view('admin.data-create', [
            'title' => 'Tambah Nilai',
            'tahun' => $tahun,
            'jenis' => $jenis,
            'link' => 'nilaisiswa?jenis_ujian=' . $jenis[0]['slug'] . '&tahun_ujian=' . $tahun[0]['slug'],
            'siswa' => $siswa
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
            'user_id' => 'required',
            'jenis_ujian_id' => 'required',
            'tahun_ujian_id' => 'required',
            'pkn' => 'required|numeric',
            'mtk' => 'required|numeric',
            'ing' => 'required|numeric',
            'ind' => 'required|numeric',
            'pjok' => 'required|numeric',
            'jawa' => 'required|numeric',
            'ipa' => 'required|numeric',
            'ips' => 'required|numeric',
        ]);

        DataNilaiSiswa::create($validate);
        return redirect('/nilaisiswa?jenis_ujian=' . $request->jenis_ujian . '&tahun_ujian=' . $request->tahun_ujian)->with('success', 'Data Berhasil Ditambahkan!');
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
        $dataNilai = DataNilaiSiswa::whereHas('user', function (Builder $query) {
            $query->where('sekolah_id', auth()->user()->sekolah_id)
                ->where('role_id', 3)
                ->where('kelas_id', auth()->user()->walikelas_id);
        })->where('id', $id)->get();

        if ($dataNilai->count() == 0) {
            return redirect('/nilaisiswa')->with('fail', "Terjadi Kesalahan!");
        }
        $dataNilai = $dataNilai[0];
        $jenis = JenisUjian::where('id', $dataNilai->jenis_ujian_id)->get();
        $tahun = TahunUjian::where('id', $dataNilai->tahun_ujian_id)->get();
        // return ;
        return view('admin.data-create', [
            'title' => 'Edit Nilai Siswa',
            'siswa' => $dataNilai,
            'link' => 'nilaisiswa/' . $id . '?jenis_ujian=' . $jenis[0]['slug'] . '&tahun_ujian=' . $tahun[0]['slug'],
            'mode' => 'nilaisiswa?jenis_ujian=' . $jenis[0]['slug'] . '&tahun_ujian=' . $tahun[0]['slug']
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
            // 'user_id' => 'required',
            // 'jenis_ujian_id' => 'required',
            // 'tahun_ujian_id' => 'required',
            'pkn' => 'required|numeric',
            'mtk' => 'required|numeric',
            'ing' => 'required|numeric',
            'ind' => 'required|numeric',
            'pjok' => 'required|numeric',
            'jawa' => 'required|numeric',
            'ipa' => 'required|numeric',
            'ips' => 'required|numeric',
        ]);

        DataNilaiSiswa::where('id', $id)->update($validate);
        return redirect('/nilaisiswa?jenis_ujian=' . $request->jenis_ujian . '&tahun_ujian=' . $request->tahun_ujian)->with('success', 'Data Berhasil Diubah!');
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
