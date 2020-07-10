<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsalSekolah extends Model
{
    protected $table = 'asal_sekolah';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function CalonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
