<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
     public function index()
    {
        $user = Auth::user();

        
        $totalEvents = Event::whereDate('date', '>=', today())->count();

        $myTicketsCount = Registration::where('user_id', $user->id)->count();

        $confirmedTicketsCount = Registration::where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->count();

        $totalSpent = Registration::where('user_id', $user->id)
            ->join('events', 'registrations.event_id', '=', 'events.id')
            ->sum('events.price');
 
        $recommendedEvents = Event::whereDate('date', '>=', today())
            ->latest()
            ->take(4)
            ->get();

         
        $recentRegistration = Registration::with('event')
            ->where('user_id', $user->id)
            ->latest()
            ->first();

        return view('student.dashboard', compact(
            'totalEvents',
            'myTicketsCount',
            'confirmedTicketsCount',
            'totalSpent',
            'recommendedEvents',
            'recentRegistration'
        ));
    }
}
