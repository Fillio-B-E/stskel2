<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantAdminDetails;
use Illuminate\Http\Request;

class AdminRestaurantController extends Controller
{
    // List (admin)
    public function index()
    {
        // get restaurants with their admin details
        $restaurants = Restaurant::with('adminDetails')->get();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    // Show create form
    public function create()
    {
        return view('admin.restaurants.create');
    }

    // Store new restaurant + admin details
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'location'   => 'required|string|max:255',
            'image_main' => 'nullable|image',
        ]);

        // create restaurant
        $restaurant = Restaurant::create([
            'name' => $request->name,
        ]);

        // handle image upload (optional) and force filename R{id}.png
        $imagePath = null;
        if ($request->hasFile('image_main')) {
            $filename = 'R' . $restaurant->id . '.png';
            $request->file('image_main')->move(public_path('images/restaurants'), $filename);
            $imagePath = 'images/restaurants/' . $filename;
        }

        // create admin details
        RestaurantAdminDetails::create([
            'restaurant_id' => $restaurant->id,
            'location'      => $request->location,
            'image_main'    => $imagePath,
        ]);

        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant created successfully.');
    }

    // Show edit form (by restaurant id)
    public function edit($id)
    {
        $restaurant = Restaurant::with('adminDetails')->findOrFail($id);
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    // Update restaurant + admin details
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'location'   => 'required|string|max:255',
            'image_main' => 'nullable|image',
        ]);

        $restaurant = Restaurant::with('adminDetails')->findOrFail($id);

        // update restaurant name
        $restaurant->update(['name' => $request->name]);

        // update image if present
        if ($request->hasFile('image_main')) {
            $filename = 'R' . $restaurant->id . '.png';
            $request->file('image_main')->move(public_path('images/restaurants'), $filename);
            $imagePath = 'images/restaurants/' . $filename;
            // ensure adminDetails exists
            if ($restaurant->adminDetails) {
                $restaurant->adminDetails->update(['image_main' => $imagePath]);
            } else {
                RestaurantAdminDetails::create([
                    'restaurant_id' => $restaurant->id,
                    'location'      => $request->location,
                    'image_main'    => $imagePath,
                ]);
            }
        } else {
            // update/create adminDetails location
            if ($restaurant->adminDetails) {
                $restaurant->adminDetails->update(['location' => $request->location]);
            } else {
                RestaurantAdminDetails::create([
                    'restaurant_id' => $restaurant->id,
                    'location'      => $request->location,
                    'image_main'    => null,
                ]);
            }
        }

        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant updated successfully.');
    }

    // Delete restaurant and its admin details + image file
    public function destroy($id)
    {
        // $id is restaurant id
        $restaurant = Restaurant::with('adminDetails')->findOrFail($id);

        // delete image if exists
        if ($restaurant->adminDetails && $restaurant->adminDetails->image_main) {
            $imagePath = public_path($restaurant->adminDetails->image_main);
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }
        } else {
            // fallback to R{id}.png naming
            $possible = public_path('images/restaurants/R' . $restaurant->id . '.png');
            if (file_exists($possible)) {
                @unlink($possible);
            }
        }

        // delete admin detail record (if exists)
        if ($restaurant->adminDetails) {
            $restaurant->adminDetails->delete();
        }

        // delete restaurant record
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant deleted successfully.');
    }
}
