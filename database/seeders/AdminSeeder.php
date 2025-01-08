<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'adminIKF',
            'password' => Hash::make('adminIKF123'), // Password hashed
            'role' => 'admin', // Pastikan role admin diset di sini
        ]);
    }
}
