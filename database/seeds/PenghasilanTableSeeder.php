<?php

use Illuminate\Database\Seeder;
use App\Models\Penghasilan;

class PenghasilanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penghasilan::create([
            'jumlah_penghasilan' => 'Rp. 0 - 500.000'
        ]);

        Penghasilan::create([
            'jumlah_penghasilan' => 'Rp. 500.000 - 999.999'
        ]);

        Penghasilan::create([
            'jumlah_penghasilan' => 'Rp. 1.000.000 - 1.999.999'
        ]);

        Penghasilan::create([
            'jumlah_penghasilan' => 'Rp. 2.000.000 - 4.999.999'
        ]);

        Penghasilan::create([
            'jumlah_penghasilan' => 'Rp. 5.000.000 - 20.000.000'
        ]);

        Penghasilan::create([
            'jumlah_penghasilan' => 'Lebih dari 20.000.000'
        ]);
    }
}
