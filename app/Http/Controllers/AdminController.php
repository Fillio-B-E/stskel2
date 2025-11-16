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

        $totalGuests = Reservation::sum('guests');

        $totalCustomers = Reservation::distinct('user_id')->count('user_id');

        $income = 0;
        if (Schema::hasColumn('reservations', 'amount')) {
            $income = Reservation::sum('amount');
        } else {
            $income = $totalGuests * 25;
        }

        $latestReservations = Reservation::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.dashboard', [
            'totalReservations'     => $totalReservations, 
            'totalRevenue'      => $income,
            'totalCustomers'      => $totalCustomers,
            'latestReservations' => $latestReservations,
        ]);
    }
}
