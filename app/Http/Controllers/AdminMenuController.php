<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    // LIST PAGE
    public function index()
    {
        $menus = Menu::with('restaurant')->get();
        return view('admin.menu.index', compact('menus'));
    }

    // CREATE PAGE
    public function create()
    {
        $restaurants = Restaurant::all();
        return view('admin.menu.create', compact('restaurants'));
    }

    // STORE MENU
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'restaurant_id' => 'required|exists:restaurants,id',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // CREATE MENU FIRST
        $menu = Menu::create([
            'name' => $request->name,
            'restaurant_id' => $request->restaurant_id,
            'description' => $request->description,
        ]);

        // IMAGE LOGIC (SAME AS RESTAURANT)
        if ($request->hasFile('image')) {
            $filename = 'M' . $menu->id . '.png';  // SAME PATTERN!
            $request->file('image')->move(public_path('images/menu'), $filename);
            $menu->image = 'images/menu/' . $filename;
            $menu->save();
        }

        return redirect()->route('admin.menu.index')->with('success', 'Menu created successfully!');
    }

    // EDIT PAGE
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $menu->name = $request->name;

        if ($request->hasFile('image')) {

            if ($menu->image && file_exists(public_path($menu->image))) {
                unlink(public_path($menu->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/menu'), $imageName);
            $menu->image = 'images/menu/' . $imageName;
        }

        $menu->save();

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu Updated Successfully!');
    }



    // DELETE MENU
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Delete image if exists
        if ($menu->image && file_exists(public_path($menu->image))) {
            unlink(public_path($menu->image));
        }

        $menu->delete();

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu deleted successfully!');
    }
}
