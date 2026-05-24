<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPeminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(
            ModelUser::class,
            'user_id'
        );
    }

    public function alat()
    {
        return $this->belongsTo(
            ModelAlat::class,
            'alat_id'
        );
    }
}