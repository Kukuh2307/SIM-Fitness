<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nama_User',
        'Nama_Instruktur',
        'Nama_Kelas',
        'Total_Biaya',
        'Metode_Pembayaran',
        'Status',
        'snap_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function setStatus($status)
    {
        $this->attributes['Status'] = $status;
        $this->save();
    }
}
