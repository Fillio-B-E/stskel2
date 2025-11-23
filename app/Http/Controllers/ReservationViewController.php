<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class ReservationViewController extends Controller
{
    // Show list of restaurants for users
    public function index()
    {
        $restaurants = Restaurant::with('adminDetails')->get();
        return view('reservation', compact('restaurants'));
    }

    // Show a single restaurant detail
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        // Get menus belonging to this restaurant:
        $menus = \App\Models\Menu::where('restaurant_id', $restaurant->id)->get();

        return view('restaurant_detail', compact('restaurant', 'menus'));
    }
}
