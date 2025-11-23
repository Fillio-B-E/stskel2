<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ScheduleController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->with('restaurant')
            ->get();

        return view('schedule.index', compact('reservations'));
    }
}


