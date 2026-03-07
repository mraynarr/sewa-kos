<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin System',
            'nickname' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '08123456781',
        ]);

        User::create([
            'name' => 'Owner Kos',
            'nickname' => 'Rafi',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'owner',
            'phone' => '08123456782',
        ]);

        User::create([
            'name' => 'Penyewa User',
            'nickname' => 'Jenengmu',
            'email' => 'penyewa@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'penyewa',
            'phone' => '08123456783',
        ]);

        $this->call([
            RoomTypeSeeder::class,
            RoomSeeder::class,
            AdditionalServiceSeeder::class,
        ]);
    }
}
