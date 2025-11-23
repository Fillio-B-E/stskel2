<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $totalReservations = Reservation::count();

        $totalCustomers = Reservation::distinct('user_id')->count('user_id');

        $latestReservations = Reservation::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'totalReservations'     => $totalReservations, 
            'totalCustomers'      => $totalCustomers,
            'latestReservations' => $latestReservations,
        ]);
    }
}
