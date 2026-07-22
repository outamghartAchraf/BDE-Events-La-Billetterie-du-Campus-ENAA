<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = Registration::with('event')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('student.registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Event $event)
    {
        // 1. Check if the student is already registered
        $alreadyRegistered = Registration::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

        if ($alreadyRegistered) {
            return back()->with('error', 'You are already registered for this event.');
        }

        // 2. Check if the event is full
        if ($event->registrations()->count() >= $event->capacity) {
            return back()->with('error', 'Sorry, this event is full.');
        }

        // 3. Generate a unique reservation code
        do {
            $reservationCode = 'BDE-' . date('Y') . '-' . strtoupper(Str::random(5));
        } while (Registration::where('reservation_code', $reservationCode)->exists());

        // 4. Create the registration
        Registration::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'reservation_code' => $reservationCode,
            'status' => 'confirmed',
        ]);

        return redirect()->route('student.tickets.index')
            ->with('success', 'Registration completed successfully.');
    }


    /**
     * Display the specified resource.
     */
     public function show(Registration $registration)
    {
        // Ensure the student can only view their own ticket
        abort_if($registration->user_id !== Auth::id(), 403);

        $registration->load('event', 'user');

        return view('student.registrations.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
