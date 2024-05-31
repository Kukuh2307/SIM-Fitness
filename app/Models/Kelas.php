<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_Instruktur',
        'Nama_Kelas',
        'Deskripsi',
        'Biaya',
        'Waktu_Mulai',
        'Waktu_Selesai',
        'Hari',
        'Kuota',
        'Foto',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Waktu_Mulai' => 'datetime',
        'Waktu_Selesai' => 'datetime',
    ];
}
