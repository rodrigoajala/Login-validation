<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name' => 'Rodrigo Ajala de Almeida',
            'email' => 'ajaladealmeida@gmail.com',
            'password' => bcrypt('12345678'),
            'validation_code' => rand(100000, 999999),
            'validation_code_expires_at' => now()->addMinutes(10),

        ]);

        User::create([
            'name' => 'Lynda Duarte',
            'email' => 'duartelynda1402@gmail.com',
            'password' => bcrypt('12345678'),
            'validation_code' => rand(100000, 999999),
            'validation_code_expires_at' => now()->addMinutes(10),
        ]);


    }
}
