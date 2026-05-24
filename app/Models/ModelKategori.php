<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelKategori extends Model
{
    protected $table = 'kategoris';

    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    public function alat()
    {
        return $this->hasMany(
            ModelAlat::class,
            'kategori_id'
        );
    }
}