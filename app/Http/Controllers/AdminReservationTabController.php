<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationTabController extends Controller
{
    public function index()
    {
        $totalReservations = Reservation::count();
        $totalCustomers    = Reservation::distinct('user_id')->count('user_id');

        $reservations = Reservation::with('user', 'restaurant')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.reservations.index', compact(
            'reservations',
            'totalReservations',
            'totalCustomers'
        ));
    }
}
