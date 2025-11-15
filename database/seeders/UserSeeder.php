<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('filcaffe'),
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'Fillio',
            'email' => 'fil@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'user'
        ]);
    }
}
