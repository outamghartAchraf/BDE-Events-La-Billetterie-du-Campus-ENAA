@extends('layouts.student')
@section('title', 'Student Dashboard')
@section('page-title', 'Student Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Welcome Hero Banner with Gradient -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-indigo-900 via-indigo-800 to-slate-900 p-8 text-white shadow-xl">
        <div class="absolute -right-10 -bottom-10 w-72 h-72 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute right-40 -top-10 w-52 h-52 bg-sky-500/20 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl">
            <span class="px-3 py-1 text-xs font-semibold bg-indigo-500/30 text-indigo-200 rounded-full border border-indigo-400/20">Student Portal</span>
            <h2 class="text-3xl font-extrabold tracking-tight mt-3">
                Welcome back, {{ auth()->user()->name }} 👋
            </h2>
            <p class="mt-2 text-indigo-100 text-sm leading-relaxed">
                Discover upcoming university events, manage your ticket reservations, and stay involved on campus.
            </p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Upcoming Events -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Available Events</span>
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $totalEvents ?? 0 }}</span>
            </div>
        </div>

        <!-- My Tickets -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">My Tickets</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2 2 2 0 012 2 2 2 0 01-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 01-2-2 2 2 0 012-2V7a2 2 0 00-2-2H5z"/></svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $myTicketsCount ?? 0 }}</span>
            </div>
        </div>

        <!-- Confirmed Reservations -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Confirmed</span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $confirmedTicketsCount ?? 0 }}</span>
            </div>
        </div>

        <!-- Total Spent -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Spent</span>
                <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-sky-600 group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-baseline gap-1">
                <span class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ number_format($totalSpent ?? 0, 2) }}</span>
                <span class="text-xs font-bold text-gray-400">DH</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <a href=" " class="group bg-white p-5 rounded-2xl border border-gray-200/80 shadow-xs hover:border-indigo-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-600 text-white flex items-center justify-center group-hover:scale-105 transition-transform shadow-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <div>
                <h3 class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">Explore Campus Events</h3>
                <p class="text-xs text-gray-500 mt-0.5">Browse upcoming workshops, seminars, and activities.</p>
            </div>
        </a>

        <a href=" " class="group bg-white p-5 rounded-2xl border border-gray-200/80 shadow-xs hover:border-indigo-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-slate-900 text-white flex items-center justify-center group-hover:scale-105 transition-transform shadow-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2 2 2 0 012 2 2 2 0 01-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 01-2-2 2 2 0 012-2V7a2 2 0 00-2-2H5z"/></svg>
            </div>
            <div>
                <h3 class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">Access My Tickets</h3>
                <p class="text-xs text-gray-500 mt-0.5">View active reservations and download event passes.</p>
            </div>
        </a>
    </div>

    <!-- Recent Reservation & Recommended Events Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recommended Events (2 cols) -->
        <div class="lg:col-span-2 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-bold text-gray-900">Recommended Events</h3>
                    <p class="text-xs text-gray-400 mt-0.5">Activities you might be interested in</p>
                </div>
                <a href=" " class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">View All →</a>
            </div>

            @php
                $recommendedEvents = $recommendedEvents ?? [];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @forelse($recommendedEvents ?? [] as $event)
                    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col group">
                        <div class="relative h-40 overflow-hidden bg-gray-100">
                            <img src="{{ $event->image_url ?? 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&auto=format&fit=crop&q=60' }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 right-3 px-2.5 py-1 rounded-lg text-[11px] font-bold bg-white/90 backdrop-blur-md text-gray-900 shadow-sm border border-white/20">
                                {{ $event->price > 0 ? number_format($event->price, 2) . ' DH' : 'Free' }}
                            </span>
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors line-clamp-1">{{ $event->title }}</h4>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2 leading-relaxed">{{ $event->description }}</p>
                            </div>
                            <div class="space-y-3 pt-2 border-t border-gray-100">
                                <div class="flex items-center text-xs text-gray-500 gap-2">
                                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                                    <span>{{ $event->date }}</span>
                                </div>
                                <a href=" " class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-200">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 bg-white rounded-2xl border border-gray-200/80 p-8 text-center text-gray-400">
                        <svg class="w-10 h-10 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                        <p class="mt-2 text-xs font-medium text-gray-500">No recommended events available right now.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Reservation Sidebar Widget (1 col) -->
        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-bold text-gray-900">Recent Reservation</h3>
                <p class="text-xs text-gray-400 mt-0.5">Your latest booked pass</p>
            </div>

            @if(isset($recentRegistration))
                <div class="bg-white rounded-2xl border border-gray-200/80 p-5 shadow-xs hover:shadow-xl transition-all duration-300 space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Ref Code</span>
                        <span class="px-2 py-0.5 rounded-md text-[11px] font-mono font-bold bg-indigo-50 text-indigo-600 border border-indigo-100">{{ $recentRegistration->code }}</span>
                    </div>

                    <div>
                        <h4 class="text-sm font-bold text-gray-900">{{ $recentRegistration->event->title }}</h4>
                        <p class="text-xs text-gray-500 mt-1 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                            {{ $recentRegistration->event->date }}
                        </p>
                    </div>

                    <div class="pt-2">
                        <a href=" " class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold bg-slate-900 text-white hover:bg-indigo-600 transition-colors shadow-md">
                            View Pass Ticket
                        </a>
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-2xl border border-gray-200/80 p-8 text-center text-gray-400">
                    <svg class="w-10 h-10 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2 2 2 0 012 2 2 2 0 01-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 01-2-2 2 2 0 012-2V7a2 2 0 00-2-2H5z"/></svg>
                    <p class="mt-3 text-xs font-medium text-gray-500">No active ticket reservations yet.</p>
                    <a href=" " class="inline-block mt-4 text-xs font-semibold text-indigo-600 hover:text-indigo-800">Browse Events →</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection