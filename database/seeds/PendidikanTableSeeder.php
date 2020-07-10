<?php

use Illuminate\Database\Seeder;
use App\Models\Pendidikan;

class PendidikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pendidikan::create([
            'nama_pendidikan' => 'SD'
        ]);

        Pendidikan::create([
            'nama_pendidikan' => 'SMP'
        ]);

        Pendidikan::create([
            'nama_pendidikan' => 'SMA'
        ]);

        Pendidikan::create([
            'nama_pendidikan' => 'S1'
        ]);

        Pendidikan::create([
            'nama_pendidikan' => 'S2'
        ]);

        Pendidikan::create([
            'nama_pendidikan' => 'S3'
        ]);

        Pendidikan::create([
            'nama_pendidikan' => 'Tidak Sekolah'
        ]);
    }
}
