<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    protected $table = 'transportasi';
    public function CalonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
