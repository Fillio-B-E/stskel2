<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        Restaurant::insert([
            ['name' => 'La Pergola'],
            ['name' => 'Commonwealth'],
            ['name' => 'Osteria Francescana'],
            ['name' => 'Le Bernardin'],
            ['name' => 'Eleven Madison Park'],
            ['name' => 'Pappas Steakhouse'],
            ['name' => 'Geronimo'],
            ['name' => 'Din Tai Fung'],
        ]);
    }
}
