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
        // Role::create([
        //     'role' => 'Administrator',
        //     'slug' => "administrator"
        // ]);
        // Role::create([
        //     'role' => 'Guru',
        //     'slug' => 'guru'
        // ]);
        // Role::create([
        //     'role' => 'Siswa',
        //     'slug' => 'siswa'
        // ]);
        // JenisUjian::create([
        //     'ujian' => "UTS",
        //     'slug' => "uts"
        // ]);
        // JenisUjian::create([
        //     'ujian' => "UAS",
        //     'slug' => "uas"
        // ]);
        // TahunUjian::create([
        //     'tahun' => '2021 - 2022',
        //     'slug' => '20212022'
        // ]);
        // TahunUjian::create([
        //     'tahun' => '2022 - 2023',
        //     'slug' => '20222023'
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
        //     'name' => "Fadhlu Ibnu 'Abbad",
        //     'email' => "fibnu@gmail.com",
        //     'password' => bcrypt(12345),
        //     'nis' => "310312079",
        //     'sekolah_id' => 1,
        //     'role_id' => 3,
        //     'kelas_id' => 1,
        // ]);
        // User::create([
        //     'name' => "Abbad",
        //     'email' => "abbad@gmail.com",
        //     'password' => bcrypt(12345),
        //     'nis' => "310312888",
        //     'sekolah_id' => 2,
        //     'role_id' => 3,
        //     'kelas_id' => 3,
        // ]);
        // User::create([
        //     'name' => "Ibnu",
        //     'email' => "ibnu@gmail.com",
        //     'password' => bcrypt(12345),
        //     'nis' => "310312079",
        //     'alamat' => "Kebumen",
        //     'sekolah_id' => 1,
        //     'role_id' => 2,
        //     'walikelas_id' => 1
        // ]);
        // User::create([
        //     'name' => "Fadhlu Ibnu",
        //     'email' => "f.ibnu@gmail.com",
        //     'password' => bcrypt(12345),
        //     'nis' => "310312079",
        //     'sekolah_id' => 1,
        //     'alamat' => "Kebumen",
        //     'role_id' => 1
        // ]);

        DataNilaiSiswa::create([
            'user_id' => 1,
            'jenis_ujian_id' => 1,
            'tahun_ujian_id' => 2,
            'pkn' => 80,
            'mtk' => 86,
            'ing' => 90,
            'ind' => 85
        ]);
        DataNilaiSiswa::create([
            'user_id' => 2,
            'jenis_ujian_id' => 1,
            'tahun_ujian_id' => 2,
            'pkn' => 90,
            'mtk' => 85,
            'ing' => 95,
            'ind' => 80
        ]);
    }
}
