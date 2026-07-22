@extends('layouts.student')
@section('title', 'Campus Events')
@section('page-title', 'Browse Events')

@section('content')
<div class="space-y-6">
    <!-- Header Controls -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-base font-bold text-gray-900">Upcoming Campus Events</h2>
            <p class="text-xs text-gray-400 mt-0.5">Explore and register for university workshops and activities</p>
        </div>

        <!-- Filter / Search Form -->
        <form method="GET" action="{{ route('student.events.index') }}" class="flex items-center gap-3">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title..." class="pl-9 pr-4 py-2 bg-white border border-gray-200/80 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder:text-gray-400 shadow-xs">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-xs rounded-xl transition-all shadow-xs">
                Filter
            </button>
        </form>
    </div>

    <!-- Events Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($events as $event)
            <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col group">
                <!-- Card Cover Image -->
                <div class="relative h-48 overflow-hidden bg-gray-100">
                    <img src="{{ $event->image_url ?? 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&auto=format&fit=crop&q=60' }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    
                    <!-- Price Badge -->
                    <span class="absolute top-3 right-3 px-3 py-1 rounded-lg text-xs font-extrabold bg-white/95 backdrop-blur-md text-gray-900 shadow-sm border border-white/20">
                        {{ $event->price > 0 ? number_format($event->price, 2) . ' DH' : 'Free' }}
                    </span>

                    <!-- Remaining Seats Badge -->
                    @if ($event->remainingPlaces() > 0)
                              <span class="absolute bottom-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-bold backdrop-blur-md {{ $event->remainingPlaces() > 0 ? 'bg-emerald-500/90 text-white' : 'bg-rose-500/90 text-white' }}">
                     {{ $event->remainingPlaces() }} places left
                    </span>
                    @else
                        <span class="absolute bottom-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-bold backdrop-blur-md bg-rose-500/90 text-white">
                            Event Full
                        </span>
                    @endif
              
                </div>

                <!-- Card Content -->
                <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                    <div class="space-y-2">
                        <h3 class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors line-clamp-1">{{ $event->title }}</h3>
                        <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">{{ $event->description }}</p>
                    </div>

                    <!-- Details Metadata -->
                    <div class="space-y-2 pt-3 border-t border-gray-100 text-xs text-gray-500">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                            <span>{{ $event->date }} • {{ $event->time ?? '10:00 AM' }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="truncate">{{ $event->location }}</span>
                        </div>
                    </div>

                    <!-- Actions -->
<div class="grid grid-cols-2 gap-2 pt-2">

    <a href="{{ route('student.events.show', $event) }}"
        class="inline-flex items-center justify-center px-3 py-2 rounded-xl text-xs font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors">
        Details
    </a>

    @if(Auth::user()->registrations->contains('event_id', $event->id))

        <a href="{{ route('student.tickets.index') }}"
            class="inline-flex items-center justify-center px-3 py-2 rounded-xl text-xs font-semibold bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">

            ✓ Already

        </a>

    @elseif($event->remainingPlaces() > 0)

        <form action="{{ route('student.registrations.store', $event) }}" method="POST">
            @csrf

            <button
                class="w-full inline-flex items-center justify-center px-3 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white transition-all">

                Register

            </button>

        </form>

    @else

        <button
            disabled
            class="inline-flex items-center justify-center px-3 py-2 rounded-xl text-xs font-semibold bg-rose-100 text-rose-600 cursor-not-allowed">

            Event Full

        </button>

    @endif

</div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl border border-gray-200/80 p-12 text-center text-gray-400">
                <svg class="w-12 h-12 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                <h3 class="mt-3 text-sm font-bold text-gray-800">No Events Found</h3>
                <p class="mt-1 text-xs text-gray-400">There are currently no events matching your criteria.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if(method_exists($events, 'links'))
        <div class="pt-4">
            {{ $events->links() }}
        </div>
    @endif
</div>
@endsection