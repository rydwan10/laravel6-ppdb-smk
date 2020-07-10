<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    public function CalonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
