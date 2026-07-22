<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;

class AdminRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::with(['user', 'event']);

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($user) use ($search) {
                    $user->where('name', 'like', "%{$search}%");
                })
                    ->orWhereHas('event', function ($event) use ($search) {
                        $event->where('title', 'like', "%{$search}%");
                    });
            });
        }

        $registrations = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.registrations.index', compact('registrations'));
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()
            ->route('admin.registrations.index')
            ->with('success', 'Registration deleted successfully.');
    }

    public function show(Registration $registration)
    {
        $registration->load(['user', 'event']);

        return view('admin.registrations.show', compact('registration'));
    }

    public function update(Request $request, Registration $registration)
{
    $validated = $request->validate([
        'status' => 'required|in:pending,confirmed,cancelled',
    ]);

    $registration->update([
        'status' => $validated['status'],
    ]);

    return redirect()
        ->route('admin.registrations.show', $registration)
        ->with('success', 'Registration status updated successfully.');
}
}
