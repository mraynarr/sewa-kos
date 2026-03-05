<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Urutan ini SANGAT PENTING
        $this->call([
            RoomTypeSeeder::class,
            RoomSeeder::class,
            AdditionalServiceSeeder::class, 
        ]);
    }
}
