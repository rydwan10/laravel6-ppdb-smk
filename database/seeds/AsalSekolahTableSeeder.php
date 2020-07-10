<?php

use Illuminate\Database\Seeder;
use App\Models\AsalSekolah;

class AsalSekolahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AsalSekolah::create([
            'npsn' => '20210836',
            'nama_sekolah' => 'SMP Y 17 CIBALONG',
            'alamat' => 'Jl.Raya Karangnunggal no. 205',
        ]);

        AsalSekolah::create([
            'npsn' => '20210828',
            'nama_sekolah' => 'SMP NEGERI 1 CIBALONG',
            'alamat' => 'Jl.Raya Karangnunggal no. 49',
        ]);

        AsalSekolah::create([
            'npsn' => '20210790',
            'nama_sekolah' => 'SMP NEGERI 2 CIBALONG',
            'alamat' => 'Jl.Raya Karangnunggal no. 205',
        ]);

        AsalSekolah::create([
            'npsn' => '20253545',
            'nama_sekolah' => 'SMP NEGERI 3 CIBALONG',
            'alamat' => 'Jl.Raya Karangnunggal',
        ]);

        AsalSekolah::create([
            'npsn' => '69994891',
            'nama_sekolah' => 'SMPT MIFTAHUL HIDAYAH',
            'alamat' => 'Jl.Raya Karangnunggal - Patrol',
        ]);
    }
}
