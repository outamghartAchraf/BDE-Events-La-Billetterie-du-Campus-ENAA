<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;
use App\Models\User;
class AdminController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();

        $totalStudents = User::where('role', 'student')->count();

        $totalRegistrations = Registration::count();

        $upcomingEvents = Event::whereDate('date', '>=', today())->count();

        $events = Event::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalEvents',
            'totalStudents',
            'totalRegistrations',
            'upcomingEvents',
            'events'
        ));
    }
}
