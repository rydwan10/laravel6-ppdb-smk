<?php

use Illuminate\Database\Seeder;
use App\Models\Jalur;

class JalurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jalur::create([
            'nama_jalur' => 'Prestasi'
        ]);

        Jalur::create([
            'nama_jalur' => 'Umum'
        ]);
    }
}
