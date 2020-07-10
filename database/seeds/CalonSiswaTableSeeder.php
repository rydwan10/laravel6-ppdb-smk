<?php

use Illuminate\Database\Seeder;

class CalonSiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\CalonSiswa::class, 100)->create();
    }
}
