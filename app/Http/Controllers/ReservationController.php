<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // Save reservation
    public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'restaurant_name' => 'required|string',
        'name' => 'required|string|max:255',
        'guests' => 'required|integer',
        'date' => 'required|date',
        'time' => 'required',
    ]);

    // Save to database (assuming you have a Reservation model)
    $reservation = \App\Models\Reservation::create([
        'restaurant_name' => $request->restaurant_name,
        'name' => $request->name,
        'guests' => $request->guests,
        'date' => $request->date,
        'time' => $request->time,
    ]);

    // Redirect to menu page with restaurant name
    return redirect()->route('menu.show', ['restaurant' => $request->restaurant_name]);
}


    // Show user’s reservations
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())->latest()->get();
        return view('schedule.index', compact('reservations'));
    }
    
}
