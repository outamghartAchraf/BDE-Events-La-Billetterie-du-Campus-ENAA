<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ReporterController extends Controller
{
    public function index() {

       $totalEvents = Event::count();
       
        return view("reporter.static", compact('totalEvents'));
    }
}
