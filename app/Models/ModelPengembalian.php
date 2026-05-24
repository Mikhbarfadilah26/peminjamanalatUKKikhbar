<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPengembalian extends Model
{
    protected $table = 'pengembalians';

    protected $fillable = [
        'peminjaman_id',
        'tanggal_pengembalian',
        'keterlambatan',
        'denda',
        'kondisi_kembali',
        'catatan'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(ModelPeminjaman::class, 'peminjaman_id');
    }
}