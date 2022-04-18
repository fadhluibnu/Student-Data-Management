<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataNilaiSiswa extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $with = ['jenis_ujian', 'tahun_ujian', 'user'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['jenis_ujian'] ?? false, function ($query, $jenisUjian) {
            return $query->whereHas('jenis_ujian', function ($query) use ($jenisUjian) {
                $query->where('slug', $jenisUjian);
            });
        });

        $query->when($filters['tahun_ujian'] ?? false, function ($query, $tahunUjian) {
            return $query->whereHas('tahun_ujian', function ($query) use ($tahunUjian) {
                $query->where('slug', $tahunUjian);
            });
        });
    }

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
