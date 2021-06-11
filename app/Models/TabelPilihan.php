<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JurusanSekolah;
use App\Models\Prodi;


class TabelPilihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jurusan_sekolah', 'prodi_id'
    ];

    public function jurusansekolah()
    {
        return $this->belongsTo(JurusanSekolah::class, 'id_jurusan_sekolah');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }


}

