<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Passenger User',
            'email' => 'passenger@example.com',
            'password' => Hash::make('password'),
            'role' => 'passenger',
        ]);

        User::create([
            'name' => 'Inspector User',
            'email' => 'inspector@example.com',
            'password' => Hash::make('password'),
            'role' => 'inspector',
        ]);
    }
}

