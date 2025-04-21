<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //eloquent
        user::create([
            'name' => 'Raka',
            'email' => 'raka14@gmail.com',
            'password' => '12345678',
        ]);
    }
}
