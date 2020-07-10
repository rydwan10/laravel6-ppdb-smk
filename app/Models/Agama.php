<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'agama';
    public function CalonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
