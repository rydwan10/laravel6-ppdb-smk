<?php

use Illuminate\Database\Seeder;
use App\Models\Pekerjaan;

class PekerjaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Pekerjaan::create([
            'nama_pekerjaan' => 'Buruh'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Nelayan'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Petani'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Peternak'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Pedagang'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Pensiunan'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Karyawan Swasta'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Guru'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Perangkat Desa'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'PNS/TNI/Polri'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Wiraswasta'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Wirausaha'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'TKI'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Sudah Meninggal'
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'Tidak Bekerja'
        ]);
    }
}
