<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantAdminDetails;
use Illuminate\Http\Request;

class AdminRestaurantController extends Controller
{
    // ─────────────────────────────────────────
    // DISPLAY LIST
    // ─────────────────────────────────────────
    public function index()
    {
        $restaurants = RestaurantAdminDetails::with('restaurant')->get();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    // ─────────────────────────────────────────
    // SHOW CREATE FORM
    // ─────────────────────────────────────────
    public function create()
    {
        return view('admin.restaurants.create');
    }

    // ─────────────────────────────────────────
    // STORE NEW RESTAURANT
    // ─────────────────────────────────────────
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'location'  => 'required|string|max:255',
            'image_main' => 'required|image',
        ]);

        // 1. Create Restaurant
        $restaurant = Restaurant::create([
            'name' => $request->name,
        ]);

        // 2. Upload Image
        $imagePath = $request->file('image_main')->store('restaurants/main', 'public');

        // 3. Create Admin Details Row
        RestaurantAdminDetails::create([
            'restaurant_id' => $restaurant->id,
            'location'      => $request->location,
            'image_main'    => $imagePath,
        ]);

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant created successfully!');
    }

    public function edit($id)
    {
        $detail = RestaurantAdminDetails::with('restaurant')->findOrFail($id);

        return view('admin.restaurants.edit', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $detail = RestaurantAdminDetails::with('restaurant')->findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:255',
            'location'  => 'required|string|max:255',
            'image_main' => 'nullable|image',
        ]);

        // 1. Update restaurant name
        $detail->restaurant->update([
            'name' => $request->name,
        ]);

        // 2. Update image (only if new file uploaded)
        if ($request->hasFile('image_main')) {
            $imagePath = $request->file('image_main')->store('restaurants/main', 'public');
            $detail->image_main = $imagePath;
        }

        // 3. Update location
        $detail->location = $request->location;

        $detail->save();

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant updated successfully!');
    }

    // ─────────────────────────────────────────
    // DELETE RESTAURANT
    // ─────────────────────────────────────────
    public function destroy($id)
    {
        RestaurantAdminDetails::findOrFail($id)->delete();
        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Restaurant deleted successfully!');
    }
}
