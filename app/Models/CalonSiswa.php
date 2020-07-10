<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{

    protected $table = 'calon_siswa';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relationship to another Table

    public function Agama()
    {
        return $this->hasMany(Agama::class, 'id_agama');
    }

    public function AsalSekolah()
    {
        return $this->hasOne(AsalSekolah::class, 'id', 'id_asal_sekolah');
    }

    public function Jalur()
    {
        return $this->hasOne(Jalur::class);
    }


    public function Jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }


    public function Pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }

    public function Pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }

    public function Penghasilan()
    {
        return $this->hasMany(Penghasilan::class);
    }

    public function TempatTinggal()
    {
        return $this->hasOne(TempatTinggal::class);
    }

    public function Transportasi()
    {
        return $this->hasOne(Transportasi::class);
    }
}
