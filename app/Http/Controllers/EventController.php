<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Services\ImageDataUriService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct(private ImageDataUriService $imageDataUriService) {}

    public function index()
    {
        $query = Event::query();

        $search = request()->input('search');
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%");
        }

        $events = $query->latest()->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $this->authorize('create', Event::class);

        return view('admin.events.create');
    }

    /**
     * Store a new event.
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->validated();
        $image = $request->file('image');
        unset($data['image']);

        $data['created_by'] = Auth::id();

        if ($image instanceof UploadedFile) {
            $data['image_path'] = $this->imageDataUriService->encode($image);
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
        $this->authorize('update', $event);

        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update event.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $this->authorize('update', $event);

        $data = $request->validated();
        $image = $request->file('image');
        unset($data['image']);

        if ($image instanceof UploadedFile) {
            $data['image_path'] = $this->imageDataUriService->encode($image);
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
        $this->authorize('delete', $event);

        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
