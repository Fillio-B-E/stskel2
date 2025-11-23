<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        File::copyDirectory(
            database_path('seeders/menus'),
            public_path('images/menu')        
        );
        $this->call([
            UserSeeder::class,
            RestaurantSeeder::class,
            RestaurantAdminDetailsSeeder::class,
            MenuSeeder::class,
        ]);
    }
}
