<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantAdminDetailsSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = [
            ['id' => 1, 'name' => 'La Pergola',              'location' => 'Rome',         'image' => 'images/R1.png'],
            ['id' => 2, 'name' => 'Commonwealth',            'location' => 'Virginia',     'image' => 'images/R2.png'],
            ['id' => 3, 'name' => 'Osteria Francescana',     'location' => 'Italy',        'image' => 'images/R3.png'],
            ['id' => 4, 'name' => 'Le Bernardin',            'location' => 'France',       'image' => 'images/R4.png'],
            ['id' => 5, 'name' => 'Eleven Madison Park',     'location' => 'New York City','image' => 'images/R5.png'],
            ['id' => 6, 'name' => 'Pappas Steakhouse',       'location' => 'America',      'image' => 'images/R6.png'],
            ['id' => 7, 'name' => 'Geronimo',                'location' => 'America',      'image' => 'images/R7.png'],
            ['id' => 8, 'name' => 'Din Tai Fung',            'location' => 'Taiwan',       'image' => 'images/R8.png'],
        ];

        foreach ($restaurants as $res) {
            DB::table('restaurant_admin_details')->insert([
                'restaurant_id' => $res['id'],
                'location'      => $res['location'],
                'image_main'    => $res['image'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
