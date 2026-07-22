<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
         $events = Event::latest()->paginate(9);

        return view('student.events.index', compact('events'));
    }

    public function show(Event $event)
    {
        return view('student.events.show', compact('event'));
    }
}
