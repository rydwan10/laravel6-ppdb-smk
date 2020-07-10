<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Rydwan',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'name' => 'Rifki Zaelani',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('petugas'),
        ]);
    }
}
