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

        $userId = Auth::id();

        // Normalize values for matching (trim, etc.)
        $restaurant = trim($request->restaurant_name);
        $name = trim($request->name);
        $date = $request->date;
        $time = $request->time;
        $guests = (int) $request->guests;

        // Check if an identical reservation already exists (within same user)
        $exists = Reservation::where('user_id', $userId)
            ->where('restaurant_name', $restaurant)
            ->where('name', $name)
            ->where('date', $date)
            ->where('time', $time)
            ->where('guests', $guests)
            ->exists();

        if ($exists) {
            // Return JSON for AJAX or a redirect for non-AJAX
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Duplicate reservation ignored'], 200);
            }
            return redirect()->back()->with('info', 'You already have this reservation.');
        }

        $reservation = Reservation::create([
            'user_id' => $userId,
            'restaurant_name' => $restaurant,
            'name' => $name,
            'guests' => $guests,
            'date' => $date,
            'time' => $time,
        ]);

        if ($request->expectsJson()) {
            return response()->json(['id' => $reservation->id], 201);
        }

        return redirect()->route('menu.show', ['restaurant' => $restaurant]);
    }



    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);   // <-- 10 per page

        return view('schedule.index', compact('reservations'));
    }
}
