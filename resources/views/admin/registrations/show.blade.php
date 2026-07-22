@extends('layouts.admin') {{-- Adjust to your actual admin layout path --}}
@section('title', 'Registration Details #' . $registration->code)
@section('page-title', 'Registration Details')

@section('content')
<div class="space-y-6 max-w-5xl mx-auto">

    <!-- Header & Back Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.registrations.index') }}" class="p-2 rounded-xl bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-all shadow-xs">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="text-xl font-bold text-gray-900 tracking-tight">Registration Pass</h2>
                    <span class="px-2.5 py-0.5 rounded-md text-xs font-mono font-bold bg-indigo-50 text-indigo-600 border border-indigo-100">
                        {{ $registration->code ?? ('REF-' . $registration->id) }}
                    </span>
                </div>
                <p class="text-xs text-gray-500 mt-0.5">Booked on {{ $registration->created_at ? $registration->created_at->format('M d, Y \a\t H:i A') : 'N/A' }}</p>
            </div>
        </div>

        <!-- Header Actions -->
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.registrations.pdf', $registration->id) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold bg-indigo-600 text-white hover:bg-indigo-700 transition-all shadow-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Download PDF Ticket
            </a>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Column: Details (2 Cols) -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Event Summary Card -->
            <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs p-6 space-y-5">
                <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">Event Information</h3>
                    <a href="{{ route('admin.events.show', $registration->event->id ?? '#') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800">
                        View Event Page →
                    </a>
                </div>

                <div class="flex flex-col sm:flex-row gap-5">
                    @if(isset($registration->event->image_url))
                        <img src="{{ $registration->event->image_url }}" alt="{{ $registration->event->title }}" class="w-full sm:w-32 h-32 rounded-xl object-cover border border-gray-100 shrink-0">
                    @endif
                    <div class="space-y-2 flex-1">
                        <h4 class="text-base font-bold text-gray-900">{{ $registration->event->title ?? 'Event Title Unavailable' }}</h4>
                        <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">{{ $registration->event->description ?? 'No description provided.' }}</p>
                        
                        <div class="grid grid-cols-2 gap-3 pt-2">
                            <div class="flex items-center gap-2 text-xs text-gray-600">
                                <svg class="w-4 h-4 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                                <span>{{ $registration->event->date ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-gray-600">
                                <svg class="w-4 h-4 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>{{ $registration->event->location ?? 'Campus Main Hall' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendee Details Card -->
            <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs p-6 space-y-4">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider pb-3 border-b border-gray-100">Attendee Information</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-gray-400 font-medium">Full Name</span>
                        <p class="text-sm font-bold text-gray-900 mt-1">{{ $registration->user->name ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <span class="text-gray-400 font-medium">Email Address</span>
                        <p class="text-sm font-bold text-gray-900 mt-1">{{ $registration->user->email ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <span class="text-gray-400 font-medium">Student / User ID</span>
                        <p class="text-sm font-mono font-bold text-gray-900 mt-1">#{{ $registration->user->id ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <span class="text-gray-400 font-medium">Account Role</span>
                        <p class="text-sm font-bold text-gray-900 capitalize mt-1">{{ $registration->user->role ?? 'Student' }}</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Status & Payment (1 Col) -->
        <div class="space-y-6">

            <!-- Status & Management Widget -->
            <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs p-6 space-y-5">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider pb-3 border-b border-gray-100"> Pass Status</h3>

                <div>
                    <label class="text-xs text-gray-400 font-medium">Current Status</label>
                    <div class="mt-2">
                        @php
                            $statusClasses = [
                                'confirmed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'pending'   => 'bg-amber-50 text-amber-700 border-amber-200',
                                'cancelled' => 'bg-rose-50 text-rose-700 border-rose-200',
                            ][$registration->status] ?? 'bg-gray-50 text-gray-600 border-gray-200';
                        @endphp
                        <span class="inline-block px-3 py-1.5 rounded-lg text-xs font-bold border uppercase tracking-wider {{ $statusClasses }}">
                            {{ $registration->status }}
                        </span>
                    </div>
                </div>

                <!-- Update Status Form -->
                <form action="{{ route('admin.registrations.update', $registration->id) }}" method="POST" class="space-y-3 pt-2">
                    @csrf
                    @method('PUT')
                    
                    <label for="status" class="text-xs text-gray-500 font-medium">Update Status</label>
                    <select name="status" id="status" class="w-full px-3 py-2 rounded-xl text-xs border border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none bg-white">
                        <option value="confirmed" {{ $registration->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="pending" {{ $registration->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="cancelled" {{ $registration->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>

                    <button type="submit" class="w-full px-4 py-2.5 rounded-xl text-xs font-semibold bg-slate-900 text-white hover:bg-indigo-600 transition-colors shadow-xs">
                        Save Changes
                    </button>
                </form>
            </div>

            <!-- Payment & Ticket Summary -->
            <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs p-6 space-y-4">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider pb-3 border-b border-gray-100">Payment Breakdown</h3>

                <div class="space-y-2 text-xs">
                    <div class="flex justify-between text-gray-500">
                        <span>Ticket Price</span>
                        <span class="font-bold text-gray-900">
                            {{ isset($registration->event->price) && $registration->event->price > 0 ? number_format($registration->event->price, 2) . ' DH' : '0.00 DH' }}
                        </span>
                    </div>
                    <div class="flex justify-between text-gray-500">
                        <span>Service Fee</span>
                        <span class="font-bold text-gray-900">0.00 DH</span>
                    </div>
                    <div class="pt-2 border-t border-gray-100 flex justify-between text-sm font-bold text-gray-900">
                        <span>Total Paid</span>
                        <span class="text-indigo-600">
                            {{ isset($registration->event->price) && $registration->event->price > 0 ? number_format($registration->event->price, 2) . ' DH' : 'Free' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="bg-rose-50/50 rounded-2xl border border-rose-200/80 p-5 space-y-3">
                <h4 class="text-xs font-bold text-rose-900 uppercase tracking-wider">Danger Zone</h4>
                <p class="text-[11px] text-rose-600 leading-relaxed">Permanently delete or cancel this registration record from the system.</p>
                
                <form action="{{ route('admin.registrations.destroy', $registration->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this registration?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-2 rounded-xl text-xs font-semibold bg-rose-600 text-white hover:bg-rose-700 transition-colors shadow-xs">
                        Delete Registration
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection