<?php

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::create([
            'nama_jurusan' => 'Teknik Komputer Dan Jaringan'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Teknik Kendaraan Ringan Otomotif'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Farmasi Klinis Dan Komunitas'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Teknik Elektronika Industri'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Rekayasa Perangkat Lunak'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Teknik Dan Bisnis Sepeda Motor'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Otomatisasi Dan Tata Kelola Perkantoran'
        ]);


    }
}
