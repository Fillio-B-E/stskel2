<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show($id)
    {
        // Dummy data for testing — replace images later
        $restaurants = [
            1 => [
                'name' => 'La Pergola',
                'images' => [
                    asset('images/main.png'),
                    asset('images/support1.png'),
                    asset('images/support2.png'),
                    asset('images/support3.png'),
                    asset('images/support4.png'),
                ],
            ],
            2 => [
                'name' => 'Commonwealth',
                'images' => [
                    asset('images/main.png'),
                    asset('images/support1.png'),
                    asset('images/support2.png'),
                    asset('images/support3.png'),
                    asset('images/support4.png'),
                ],
            ],
        ];

        if (!isset($restaurants[$id])) {
            abort(404, 'Restaurant not found');
        }

        $restaurant = $restaurants[$id];

        return view('restaurant_detail', compact('restaurant'));
    }
}
