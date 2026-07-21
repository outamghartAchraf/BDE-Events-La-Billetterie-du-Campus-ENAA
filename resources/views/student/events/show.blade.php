@extends('layouts.student')
@section('title', $event->title)
@section('page-title', 'Event Details')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <!-- Breadcrumbs -->
    <nav class="flex items-center text-xs font-semibold text-gray-400 gap-2">
        <a href="{{ route('student.events.index') }}" class="hover:text-indigo-600 transition-colors">Events</a>
        <span>/</span>
        <span class="text-gray-800 truncate">{{ $event->title }}</span>
    </nav>

    <!-- Main Container -->
    <div class="bg-white rounded-3xl border border-gray-200/80 shadow-xs overflow-hidden">
        <!-- Hero Image Cover -->
        <div class="relative h-72 md:h-96 w-full bg-gray-900">
            <img src="{{ $event->image_url ?? 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&auto=format&fit=crop&q=80' }}" alt="{{ $event->title }}" class="w-full h-full object-cover opacity-90">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
            
            <div class="absolute bottom-6 left-6 right-6 text-white space-y-2">
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 rounded-full text-xs font-extrabold bg-indigo-600 text-white shadow-md">
                        {{ $event->price > 0 ? number_format($event->price, 2) . ' DH' : 'Free Entry' }}
                    </span>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-md text-white">
                        {{ $event->category ?? 'Campus Life' }}
                    </span>
                </div>
                <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight">{{ $event->title }}</h1>
            </div>
        </div>

        <!-- Details Grid -->
        <div class="p-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Details Info (2 cols) -->
            <div class="md:col-span-2 space-y-6">
                <div>
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">About This Event</h3>
                    <p class="text-xs text-gray-600 mt-3 leading-relaxed whitespace-pre-line">{{ $event->description }}</p>
                </div>

                <div class="pt-6 border-t border-gray-100 space-y-4">
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">Organizer</h3>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-sm">
                            {{ substr($event->organizer ?? 'U', 0, 1) }}
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-900">{{ $event->organizer ?? 'University Event Committee' }}</p>
                            <p class="text-[11px] text-gray-400">Official Campus Host</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Meta Sidebar Card (1 col) -->
            <div class="space-y-6">
                <div class="bg-gray-50/80 rounded-2xl p-6 border border-gray-100 space-y-5">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider">Event Details</h3>

                    <div class="space-y-4 text-xs">
                        <div class="flex items-start gap-3">
                            <div class="p-2 rounded-lg bg-white shadow-xs text-indigo-600 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Date & Time</p>
                                <p class="text-gray-500 mt-0.5">{{ $event->date }}</p>
                                <p class="text-gray-400 text-[11px]">{{ $event->time ?? '10:00 AM - 02:00 PM' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="p-2 rounded-lg bg-white shadow-xs text-indigo-600 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Location</p>
                                <p class="text-gray-500 mt-0.5">{{ $event->location }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="p-2 rounded-lg bg-white shadow-xs text-indigo-600 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5-3.512M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015-3.512M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Availability</p>
                                <p class="text-gray-500 mt-0.5">{{ $event->remaining_seats ?? 10 }} seats remaining</p>
                            </div>
                        </div>
                    </div>

                    <!-- Registration CTA -->
                    <div class="pt-4 border-t border-gray-200/60">
                        @if(($event->remaining_seats ?? 10) > 0)
                            <form method="POST" action="{{ route('student.events.register', $event->id) }}">
                                @csrf
                                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl text-xs font-bold bg-indigo-600 text-white hover:bg-indigo-700 transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
                                    Reserve My Seat
                                </button>
                            </form>
                        @else
                            <div class="w-full p-3 rounded-xl bg-rose-50 border border-rose-200 text-center">
                                <span class="text-xs font-bold text-rose-600">Event Full - Registration Closed</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection