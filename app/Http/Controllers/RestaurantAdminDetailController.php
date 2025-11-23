<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantAdminDetails;
use Illuminate\Http\Request;

class RestaurantAdminDetailController extends Controller
{
    // Show list of restaurants for admin
    public function index()
    {
        $details = RestaurantAdminDetails::with('restaurant')->get();
        return view('admin.restaurants.index', compact('details'));
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

        // 1️⃣ Create the restaurant
        $restaurant = Restaurant::create([
            'name' => $request->name,
        ]);

        // 2️⃣ Handle main image upload if exists
        $mainImagePath = null;
        if ($request->hasFile('image_main')) {
            $filename = 'R' . $restaurant->id . '.png';
            $request->file('image_main')->move(public_path('images/restaurants'), $filename);
            $mainImagePath = 'images/restaurants/' . $filename;
        }

        // 3️⃣ Create restaurant admin details
        RestaurantAdminDetails::create([
            'restaurant_id' => $restaurant->id,
            'location'      => $request->location,
            'image_main'    => $mainImagePath,
        ]);

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $detail = RestaurantAdminDetails::findOrFail($id);
        return view('admin.restaurants.edit', compact('detail'));
    }

    // Update restaurant + admin details
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'location'   => 'required|string|max:255',
            'image_main' => 'nullable|image',
        ]);

        $detail = RestaurantAdminDetails::with('restaurant')->findOrFail($id);

        // Update restaurant name
        $detail->restaurant->update([
            'name' => $request->name,
        ]);

        // Update main image if uploaded
        if ($request->hasFile('image_main')) {
            $filename = 'R' . $detail->restaurant->id . '.png';
            $request->file('image_main')->move(public_path('images/restaurants'), $filename);
            $detail->image_main = 'images/restaurants/' . $filename;
        }

        // Update location
        $detail->location = $request->location;
        $detail->save();

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant updated successfully!');
    }

    // Delete admin detail (optionally the restaurant too)
    public function destroy($id)
    {
        $detail = RestaurantAdminDetails::findOrFail($id);

        // First delete the image if exists
        if ($detail->image_main && file_exists(public_path($detail->image_main))) {
            unlink(public_path($detail->image_main));
        }

        // Delete the restaurant (parent)
        if ($detail->restaurant) {
            $detail->restaurant->delete();
        }

        // Delete the admin detail (child)
        $detail->delete();

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant and details deleted successfully!');
    }
}
