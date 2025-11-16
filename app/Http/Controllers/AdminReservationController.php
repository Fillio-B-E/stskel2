<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

class AdminReservationController extends Controller
{
    public function accept($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'accepted';
        $reservation->save();

        return back()->with('success', 'Reservation accepted!');
    }

    public function deny($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'denied';
        $reservation->save();

        return back()->with('success', 'Reservation denied.');
    }

    public function show($id)
    {
        $reservation = Reservation::with('user')->findOrFail($id);

        return view('admin.reservations.show', compact('reservation'));
    }
}
