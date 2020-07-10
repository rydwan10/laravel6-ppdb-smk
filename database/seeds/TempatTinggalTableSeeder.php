<?php

use Illuminate\Database\Seeder;
use App\Models\TempatTinggal;

class TempatTinggalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TempatTinggal::create([
            'nama_tempat_tinggal' => 'Bersama Orang Tua'
        ]);

        TempatTinggal::create([
            'nama_tempat_tinggal' => 'Bersama Wali'
        ]);

        TempatTinggal::create([
            'nama_tempat_tinggal' => 'Kost'
        ]);

        TempatTinggal::create([
            'nama_tempat_tinggal' => 'Pesantren'
        ]);
    }
}
