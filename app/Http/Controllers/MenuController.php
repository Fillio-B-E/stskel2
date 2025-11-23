<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show($restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);

        $menus = \App\Models\Menu::where('restaurant_id', $restaurantId)->get();

        return view('menu.show', compact('restaurant', 'menus'));
    }
}
