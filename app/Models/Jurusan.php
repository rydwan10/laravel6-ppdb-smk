<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    public function CalonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
