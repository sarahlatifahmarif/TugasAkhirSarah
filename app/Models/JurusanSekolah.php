<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TabelPilihan;

class JurusanSekolah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_jurusan'
    ];

    public function pilihan(){
        return $this->hasMany(TabelPilihan::class, 'id_jurusan_sekolah');
    }

}
