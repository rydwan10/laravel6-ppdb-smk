<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jalur extends Model
{
    protected $table = 'jalur';
    public function CalonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
