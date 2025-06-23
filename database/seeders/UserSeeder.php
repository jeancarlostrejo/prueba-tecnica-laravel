<?php

namespace Database\Seeders;

use App\enums\Rol;
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
            'identifier' => 1,
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'name' => 'Jean Administrator',
            'phone' => '4241111111',
            'dni' => '1234567890',
            'birth_date' => '1995-11-11',
            'city_id' => 1,
            'role' => Rol::ADMIN
        ]);
    }
}
