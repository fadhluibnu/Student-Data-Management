<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataNilaiSiswa extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jenis_ujian()
    {
        return $this->belongsTo(JenisUjian::class);
    }
    public function tahun_ujian()
    {
        return $this->belongsTo(TahunUjian::class);
    }
}
