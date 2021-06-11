<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodi;

class Jurusan extends Model

{
    use HasFactory;
    protected $fillable = [
        'nama_jurusan'
    ];
    public function prodi(){
        return $this->hasMany(Prodi::class);
    }
}
