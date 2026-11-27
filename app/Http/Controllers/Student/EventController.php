<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::withCount('registrations')
            ->latest()
            ->paginate(9);

        return view('student.events.index', compact('events'));
    }

    public function show(Event $event)
    {
        return view('student.events.show', compact('event'));
    }
}
