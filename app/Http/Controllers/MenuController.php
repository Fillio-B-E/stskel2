<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show($restaurant)
    {
        // You can add real menu data later — for now, fake it
        $menus = [
            [
                'name' => "Soupe à l’oignon",
                'price' => 40,
                'desc' => "Classic French onion soup with caramelized onions, beef broth, and melted cheese.",
                'category' => "Appetizers",
                'img' => null
            ],
            [
                'name' => "Escargots de Bourgogne",
                'price' => 70,
                'desc' => "Snails baked in garlic butter, parsley, and herbs, served in their shells.",
                'category' => "Appetizers",
                'img' => null
            ],
            [
                'name' => "Foie Gras",
                'price' => 80,
                'desc' => "Rich goose liver terrine with brioche bread and fruit compote.",
                'category' => "Main Courses",
                'img' => null
            ],
        ];

        return view('menu.show', compact('restaurant', 'menus'));
    }
}
