<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAlat extends Model
{
    protected $table = 'alats';

    protected $fillable = [
        'kategori_id',
        'nama_alat',
        'stok',
        'kondisi',
        'foto',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    public function kategori()
    {
        return $this->belongsTo(ModelKategori::class, 'kategori_id');
    }
}