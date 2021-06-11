<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pertanyaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_prodi','id_kriteria','pertanyaan'
    ];
}
