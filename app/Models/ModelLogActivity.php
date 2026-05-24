<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelLogActivity extends Model
{
    protected $table = 'log_activities';

    protected $fillable = [
        'user_id',
        'aktivitas'
    ];

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'user_id');
    }
}