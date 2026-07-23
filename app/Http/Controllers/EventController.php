<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 
use App\Http\Requests\StoreEventRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a new event.
     */
public function store(StoreEventRequest $request)
{
    $data = $request->validated();

    $data['created_by'] = Auth::id();

    if ($request->hasFile('image')) {
        $data['image_path'] = $request->file('image')->store('events', 'public');
    }

    Event::create($data);

    return redirect()
        ->route('events.index')
        ->with('success', 'Event created successfully.');
}
    /**
     * Display one event.
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show edit form.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update event.
     */
public function update(UpdateEventRequest $request, Event $event)
{
    $data = $request->validated();

    if ($request->hasFile('image')) {

        // Delete old image
        if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
            Storage::disk('public')->delete($event->image_path);
        }

        // Store new image
        $data['image_path'] = $request->file('image')->store('events', 'public');
    }

    $event->update($data);

    return redirect()
        ->route('events.index')
        ->with('success', 'Event updated successfully.');
}

    /**
     * Delete event.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
