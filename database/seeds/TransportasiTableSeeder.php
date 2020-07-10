<?php

use Illuminate\Database\Seeder;
use App\Models\Transportasi;

class TransportasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transportasi::create([
            'nama_moda' => 'Angkutan Umum'
        ]);

        Transportasi::create([
            'nama_moda' => 'Sepeda Motor'
        ]);

        Transportasi::create([
            'nama_moda' => 'Mobil Pribadi'
        ]);

        Transportasi::create([
            'nama_moda' => 'Ojek'
        ]);

        Transportasi::create([
            'nama_moda' => 'Jalan Kaki'
        ]);
    }
}
