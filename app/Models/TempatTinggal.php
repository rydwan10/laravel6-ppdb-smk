<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatTinggal extends Model
{
    protected $table = 'tempat_tinggal';
    public function CalonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
