<?php

// database/seeders/MenuSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'restaurant_id' => 1,
                'name' => "Soupe à l'oignon",
                'description' => "Classic French onion soup with caramelized onions, beef broth, and melted cheese.",
                'image' => 'images/menus/menu1.png',
            ],
            [
                'restaurant_id' => 1,
                'name' => "Escargots de Bourgogne",
                'description' => "Snails baked in garlic butter, parsley, and herbs, served in their shells.",
                'image' => 'images/menus/menu2.png',
            ],
            [
                'restaurant_id' => 1,
                'name' => "Foie Gras",
                'description' => "Rich goose liver terrine with brioche bread and fruit compote.",
                'image' => 'images/menus/menu3.png',
            ],
            [
                'restaurant_id' => 1,
                'name' => "Salade Niçoise",
                'description' => "Tuna, boiled eggs, olives, anchovies, and fresh vegetables with olive oil dressing.",
                'image' => 'images/menus/menu4.png',
            ],
            [
                'restaurant_id' => 1,
                'name' => "Quiche Lorraine",
                'description' => "Savory pie with cream, cheese, smoked bacon, and a buttery crust.",
                'image' => 'images/menus/menu5.png',
            ],
            [
                'restaurant_id' => 1,
                'name' => "Pâté de Campagne",
                'description' => "Rustic pork pâté with bread, pickles, and mustard.",
                'image' => 'images/menus/menu6.png',
            ],
            [
                'restaurant_id' => 1,
                'name' => "Gougères",
                'description' => "Light cheese puffs made from choux pastry with Gruyère.",
                'image' => 'images/menus/menu7.png',
            ],
            [
                'restaurant_id' => 1,
                'name' => "Moules Marinières",
                'description' => "Mussels steamed in white wine, garlic, and shallots.",
                'image' => 'images/menus/menu8.png',
            ],
            [
                'restaurant_id' => 1,
                'name' => "Terrine de Légumes",
                'description' => "Colorful layered vegetable terrine with herbs and cream.",
                'image' => 'images/menus/menu9.png',
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
