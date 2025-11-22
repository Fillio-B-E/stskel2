<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantsSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = [
            ['id' => 1, 'name' => 'La Pergola'],
            ['id' => 2, 'name' => 'Commonwealth'],
            ['id' => 3, 'name' => 'Osteria Francescana'],
            ['id' => 4, 'name' => 'Le Bernardin'],
            ['id' => 5, 'name' => 'Eleven Madison Park'],
            ['id' => 6, 'name' => 'Pappas Steakhouse'],
            ['id' => 7, 'name' => 'Geronimo'],
            ['id' => 8, 'name' => 'Din Tai Fung'],
        ];

        foreach ($restaurants as $r) {
            Restaurant::updateOrCreate(['id' => $r['id']], $r);
        }
    }
}
