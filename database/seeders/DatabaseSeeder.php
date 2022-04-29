<?php

namespace Database\Seeders;

use App\Models\DataNilaiSiswa;
use App\Models\JenisUjian;
use App\Models\Kelas;
use App\Models\Role;
use App\Models\Sekolah;
use App\Models\TahunUjian;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Kelas::create([
        //     'kelas' => "XI RPL 4",
        //     'slug' => "xirpl4"
        // ]);
        // Kelas::create([
        //     'kelas' => "XI RPL 5",
        //     'slug' => "xirpl5"
        // ]);
        // Kelas::create([
        //     'kelas' => "XI RPL 6",
        //     'slug' => "xirpl6"
        // ]);
        // WaliKelas::create([
        //     'walas' => "XI RPL 4",
        //     'slug' => "xirpl4"
        // ]);
        // WaliKelas::create([
        //     'walas' => "XI RPL 5",
        //     'slug' => "xirpl5"
        // ]);
        // WaliKelas::create([
        //     'walas' => "XI RPL 6",
        //     'slug' => "xirpl6"
        // ]);
        Role::create([
            'role' => 'Administrator',
            'slug' => "administrator"
        ]);
        Role::create([
            'role' => 'Guru',
            'slug' => 'guru'
        ]);
        Role::create([
            'role' => 'Siswa',
            'slug' => 'siswa'
        ]);
        // JenisUjian::create([
        //     'ujian' => "UTS 1",
        //     'slug' => "uts1"
        // ]);
        // JenisUjian::create([
        //     'ujian' => "UAS 1",
        //     'slug' => "uas1"
        // ]);
        // JenisUjian::create([
        //     'ujian' => "UTS 2",
        //     'slug' => "uts1"
        // ]);
        // JenisUjian::create([
        //     'ujian' => "UAS 2",
        //     'slug' => "uas1"
        // ]);
        // TahunUjian::create([
        //     'tahun' => '2020 - 2021',
        //     'slug' => '20202021'
        // ]);
        // TahunUjian::create([
        //     'tahun' => '2021 - 2022',
        //     'slug' => '20212022'
        // ]);
        // Sekolah::create([
        //     'id_sekolah' => '01STELKOMSCHOOLS',
        //     'nama' => 'Telkom Schools'
        // ]);
        // Sekolah::create([
        //     'id_sekolah' => '02SSCHOOLS',
        //     'nama' => 'Schools'
        // ]);


        // User::create([
        //     'name' => "Ibn",
        //     'email' => "ibn@gmail.com",
        //     'password' => bcrypt(12345),
        //     'nis' => "3103128078",
        //     'sekolah_id' => 1,
        //     'kelas_id' => 3,
        //     'role_id' => 3
        // ]);
        // User::create([
        //     'name' => "AbbadA",
        //     'email' => "abbada@gmail.com",
        //     'password' => bcrypt(12345),
        //     'nis' => "310312890",
        //     'sekolah_id' => 1,
        //     'kelas_id' => 3,
        //     'role_id' => 3
        // ]);

        // // uts 1 2020-2021
        // DataNilaiSiswa::create([
        //     'user_id' => 1,
        //     'jenis_ujian_id' => 3,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 90,
        //     'mtk' => 80,
        //     'ing' => 85,
        //     'ind' => 90
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 2,
        //     'jenis_ujian_id' => 3,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 80,
        //     'mtk' => 86,
        //     'ing' => 90,
        //     'ind' => 100
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 7,
        //     'jenis_ujian_id' => 3,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 80,
        //     'mtk' => 86,
        //     'ing' => 90,
        //     'ind' => 100
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 8,
        //     'jenis_ujian_id' => 3,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 85,
        //     'mtk' => 82,
        //     'ing' => 95,
        //     'ind' => 90
        // ]);

        // // uas 1 2020 - 2021
        // DataNilaiSiswa::create([
        //     'user_id' => 1,
        //     'jenis_ujian_id' => 4,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 95,
        //     'mtk' => 85,
        //     'ing' => 82,
        //     'ind' => 94
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 2,
        //     'jenis_ujian_id' => 4,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 90,
        //     'mtk' => 82,
        //     'ing' => 95,
        //     'ind' => 80
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 7,
        //     'jenis_ujian_id' => 4,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 82,
        //     'mtk' => 88,
        //     'ing' => 95,
        //     'ind' => 92
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 8,
        //     'jenis_ujian_id' => 4,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 90,
        //     'mtk' => 80,
        //     'ing' => 92,
        //     'ind' => 98
        // ]);

        // // uts 2 2020 - 2021
        // DataNilaiSiswa::create([
        //     'user_id' => 1,
        //     'jenis_ujian_id' => 5,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 85,
        //     'mtk' => 75,
        //     'ing' => 92,
        //     'ind' => 84
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 2,
        //     'jenis_ujian_id' => 5,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 98,
        //     'mtk' => 80,
        //     'ing' => 92,
        //     'ind' => 80
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 7,
        //     'jenis_ujian_id' => 5,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 82,
        //     'mtk' => 90,
        //     'ing' => 69,
        //     'ind' => 90
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 8,
        //     'jenis_ujian_id' => 5,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 92,
        //     'mtk' => 82,
        //     'ing' => 92,
        //     'ind' => 92
        // ]);

        // // uas 2 2020 - 2021
        // DataNilaiSiswa::create([
        //     'user_id' => 1,
        //     'jenis_ujian_id' => 6,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 82,
        //     'mtk' => 100,
        //     'ing' => 95,
        //     'ind' => 85
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 2,
        //     'jenis_ujian_id' => 6,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 80,
        //     'mtk' => 100,
        //     'ing' => 94,
        //     'ind' => 84
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 7,
        //     'jenis_ujian_id' => 6,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 80,
        //     'mtk' => 90,
        //     'ing' => 70,
        //     'ind' => 92
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 8,
        //     'jenis_ujian_id' => 6,
        //     'tahun_ujian_id' => 5,
        //     'pkn' => 95,
        //     'mtk' => 85,
        //     'ing' => 75,
        //     'ind' => 85
        // ]);

        // uts 1 2021-2022
        // DataNilaiSiswa::create([
        //     'user_id' => 1,
        //     'jenis_ujian_id' => 3,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 94,
        //     'mtk' => 84,
        //     'ing' => 86,
        //     'ind' => 92
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 2,
        //     'jenis_ujian_id' => 3,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 82,
        //     'mtk' => 82,
        //     'ing' => 95,
        //     'ind' => 80
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 7,
        //     'jenis_ujian_id' => 3,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 88,
        //     'mtk' => 86,
        //     'ing' => 94,
        //     'ind' => 90
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 8,
        //     'jenis_ujian_id' => 3,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 80,
        //     'mtk' => 84,
        //     'ing' => 95,
        //     'ind' => 89
        // ]);

        // // uas 1 2021 - 2022
        // DataNilaiSiswa::create([
        //     'user_id' => 1,
        //     'jenis_ujian_id' => 4,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 95,
        //     'mtk' => 85,
        //     'ing' => 79,
        //     'ind' => 94
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 2,
        //     'jenis_ujian_id' => 4,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 90,
        //     'mtk' => 82,
        //     'ing' => 95,
        //     'ind' => 88
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 7,
        //     'jenis_ujian_id' => 4,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 82,
        //     'mtk' => 88,
        //     'ing' => 92,
        //     'ind' => 92
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 8,
        //     'jenis_ujian_id' => 4,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 90,
        //     'mtk' => 88,
        //     'ing' => 92,
        //     'ind' => 98
        // ]);

        // // uts 2 2021 - 2022
        // DataNilaiSiswa::create([
        //     'user_id' => 1,
        //     'jenis_ujian_id' => 5,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 85,
        //     'mtk' => 70,
        //     'ing' => 92,
        //     'ind' => 84
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 2,
        //     'jenis_ujian_id' => 5,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 98,
        //     'mtk' => 80,
        //     'ing' => 92,
        //     'ind' => 84
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 7,
        //     'jenis_ujian_id' => 5,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 82,
        //     'mtk' => 98,
        //     'ing' => 69,
        //     'ind' => 90
        // ]);
        // DataNilaiSiswa::create([
        //     'user_id' => 8,
        //     'jenis_ujian_id' => 5,
        //     'tahun_ujian_id' => 6,
        //     'pkn' => 92,
        //     'mtk' => 88,
        //     'ing' => 92,
        //     'ind' => 92
        // ]);
    }
}
