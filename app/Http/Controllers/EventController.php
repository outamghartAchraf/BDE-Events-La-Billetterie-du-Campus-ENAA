<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 
use App\Http\Requests\StoreEventRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateEventRequest;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);

        return view('admin.events.index', compact('events'));
    }


}
