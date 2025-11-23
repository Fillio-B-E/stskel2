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
            'restaurant_id' => 'required|integer|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'guests' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $userId = Auth::id();

        $restaurantId = (int) $request->restaurant_id;
        $name = trim($request->name);
        $date = $request->date;
        $time = $request->time;
        $guests = (int) $request->guests;

        // Check if an identical reservation already exists (same user)
        $exists = Reservation::where('user_id', $userId)
            ->where('restaurant_id', $restaurantId)
            ->where('name', $name)
            ->where('date', $date)
            ->where('time', $time)
            ->where('guests', $guests)
            ->exists();

        if ($exists) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Duplicate reservation ignored'], 200);
            }
            return redirect()->back()->with('info', 'You already made this reservation.');
        }

        $reservation = Reservation::create([
            'user_id' => $userId,
            'restaurant_id' => $restaurantId,
            'name' => $name,
            'guests' => $guests,
            'date' => $date,
            'time' => $time,
        ]);

        if ($request->expectsJson()) {
            return response()->json(['id' => $reservation->id], 201);
        }

        // redirect back to restaurant page using ID
        return redirect()->route('menu.show', ['restaurant' => $restaurantId]);
    }




    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);   // <-- 10 per page

        return view('schedule.index', compact('reservations'));
    }

    public function schedule()
    {
        $reservations = \App\Models\Reservation::where('user_id', Auth::id())
            ->with('restaurant') // to get restaurant details
            ->get();

        return view('reservation.schedule', compact('reservations'));
    }
}
