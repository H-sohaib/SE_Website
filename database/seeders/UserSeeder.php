<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'admin',
            'email' => 'harraoui.sohaib1@gmail.com',
            'password' => Hash::make("admin123/@"),
            'email_verified_at' => '2023-06-24 20:33:24'
        ]);
    }
}