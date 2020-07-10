<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghasilan extends Model
{
    protected $table = 'penghasilan';
    public function CalonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
