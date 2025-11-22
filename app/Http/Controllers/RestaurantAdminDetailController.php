<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantAdminDetails;
use Illuminate\Http\Request;

class RestaurantAdminDetailController extends Controller
{
    public function index()
    {
        $details = RestaurantAdminDetails::with('restaurant')->get();
        return view('admin.restaurants.index', compact('details'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurants.create', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'location'    => 'required|string',
            'image_main'  => 'nullable|image',
        ]);

        // Create restaurant
        $restaurant = Restaurant::create([
            'name' => $request->name,
        ]);

        $mainImagePath = null;
        if ($request->hasFile('image_main')) {

            // Force filename to match "R{id}.png"
            $filename = 'R' . $restaurant->id . '.png';

            // Save into public/images/restaurants/
            $request->file('image_main')->move(
                public_path('images/restaurants'),
                $filename
            );

            // Save only filename (optional)
            $mainImagePath = 'images/restaurants/' . $filename;
        }



        // Create restaurant details (DO NOT use $request->all())
        RestaurantAdminDetails::create([
            'restaurant_id' => $restaurant->id,
            'location'      => $request->location,
            'image_main'    => $mainImagePath,
        ]);

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant created successfully!');
    }


    public function edit($id)
    {
        $detail = RestaurantAdminDetails::findOrFail($id);
        $restaurants = Restaurant::all();

        return view('admin.restaurants.edit', compact('detail', 'restaurants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'location' => 'required',
            'image_main' => 'nullable|image',
            'name' => 'required',
        ]);

        $detail = RestaurantAdminDetails::with('restaurant')->findOrFail($id);

        // UPDATE NAME
        $detail->restaurant->update([
            'name' => $request->name,
        ]);

        // UPDATE IMAGE
        if ($request->hasFile('image_main')) {
            $imagePath = $request->file('image_main')->store('restaurants/main', 'public');
            $detail->image_main = $imagePath;
        }

        // UPDATE LOCATION
        $detail->location = $request->location;
        $detail->save();

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant updated successfully!');
    }



    public function destroy($id)
    {
        RestaurantAdminDetails::findOrFail($id)->delete();

        return redirect()->route('admin.restaurants.index')
            ->with('success', 'Restaurant detail deleted!');
    }
}
