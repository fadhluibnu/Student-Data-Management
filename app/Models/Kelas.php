<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    protected $with = [
        'users'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function data_nilai_siswas()
    {
        return $this->hasMany(DataNilaiSiswa::class);
    }
}
