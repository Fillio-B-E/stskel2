<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    
    public function store(Request $request)
{
    
    $request->validate([
        'restaurant_name' => 'required|string',
        'name' => 'required|string|max:255',
        'guests' => 'required|integer',
        'date' => 'required|date',
        'time' => 'required',
    ]);

    $reservation = \App\Models\Reservation::create([
        'restaurant_name' => $request->restaurant_name,
        'name' => $request->name,
        'guests' => $request->guests,
        'date' => $request->date,
        'time' => $request->time,
    ]);

    return redirect()->route('menu.show', ['restaurant' => $request->restaurant_name]);
}


    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())->latest()->get();
        return view('schedule.index', compact('reservations'));
    }
    
}
