<?php

use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agama::create([
            'agama' => 'Islam'
        ]);
        Agama::create([
            'agama' => 'Kristen Protestan'
        ]);
        Agama::create([
            'agama' => 'Katolik'
        ]);
        Agama::create([
            'agama' => 'Hindu'
        ]);
        Agama::create([
            'agama' => 'Buddha'
        ]);
        Agama::create([
            'agama' => 'Kong Hu Cu'
        ]);
    }
}
