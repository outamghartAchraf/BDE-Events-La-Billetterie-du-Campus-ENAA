@extends('layouts.admin') {{-- Adjust to your actual admin layout path --}}
@section('title', 'Registration Details #' . $registration->code)
@section('page-title', 'Registration Details')

@section('content')
<div class="space-y-6 max-w-5xl mx-auto" style="font-family:'Inter',sans-serif;">

    <!-- Header & Back Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.registrations.index') }}" class="p-2 rounded-xl bg-white border border-[#C9C2AE]/70 text-[#1B1B2F]/60 hover:bg-[#FAF7EF] transition-all shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="text-xl font-bold text-[#1B1B2F] tracking-tight" style="font-family:'Fraunces',serif;">Registration Pass</h2>
                    <span class="px-2.5 py-0.5 rounded-md text-xs font-bold bg-[#E8A33D]/10 text-[#B87A1F] border border-[#E8A33D]/30" style="font-family:'Space Mono',monospace;">
                        {{ $registration->code ?? ('REF-' . $registration->id) }}
                    </span>
                </div>
                <p class="text-xs text-[#1B1B2F]/50 mt-0.5">Booked on {{ $registration->created_at ? $registration->created_at->format('M d, Y \a\t H:i A') : 'N/A' }}</p>
            </div>
        </div>

        <!-- Header Actions -->
        <div class="flex items-center gap-3">

        </div>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Column: Details (2 Cols) -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Event Summary Card -->
            <div class="bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-sm p-6 space-y-5">
                <div class="flex items-center justify-between pb-4 border-b-2 border-dashed border-[#C9C2AE]">
                    <h3 class="text-[10px] font-bold text-[#1B1B2F]/40 uppercase tracking-wider" style="font-family:'Space Mono',monospace;">Event Information</h3>
                    <a href="" class="text-xs font-semibold text-[#1B1B2F] hover:text-[#C1443C] transition-colors">
                        View Event Page →
                    </a>
                </div>

                <div class="flex flex-col sm:flex-row gap-5">
                    @if(isset($registration->event->image_url))
                        <img src="{{ $registration->event->image_url }}" alt="{{ $registration->event->title }}" class="w-full sm:w-32 h-32 rounded-xl object-cover border border-[#C9C2AE]/60 shrink-0">
                    @endif
                    <div class="space-y-2 flex-1">
                        <h4 class="text-base font-bold text-[#1B1B2F]" style="font-family:'Fraunces',serif;">{{ $registration->event->title ?? 'Event Title Unavailable' }}</h4>
                        <p class="text-xs text-[#1B1B2F]/50 line-clamp-2 leading-relaxed">{{ $registration->event->description ?? 'No description provided.' }}</p>

                        <div class="grid grid-cols-2 gap-3 pt-2">
                            <div class="flex items-center gap-2 text-xs text-[#1B1B2F]/60">
                                <svg class="w-4 h-4 text-[#E8A33D] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                                <span>{{ $registration->event->date ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-[#1B1B2F]/60">
                                <svg class="w-4 h-4 text-[#E8A33D] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>{{ $registration->event->location ?? 'Campus Main Hall' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendee Details Card -->
            <div class="bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-sm p-6 space-y-4">
                <h3 class="text-[10px] font-bold text-[#1B1B2F]/40 uppercase tracking-wider pb-3 border-b-2 border-dashed border-[#C9C2AE]" style="font-family:'Space Mono',monospace;">Attendee Information</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-[#1B1B2F]/40 font-medium">Full Name</span>
                        <p class="text-sm font-bold text-[#1B1B2F] mt-1">{{ $registration->user->name ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <span class="text-[#1B1B2F]/40 font-medium">Email Address</span>
                        <p class="text-sm font-bold text-[#1B1B2F] mt-1">{{ $registration->user->email ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <span class="text-[#1B1B2F]/40 font-medium">Student / User ID</span>
                        <p class="text-sm font-bold text-[#1B1B2F] mt-1" style="font-family:'Space Mono',monospace;">#{{ $registration->user->id ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <span class="text-[#1B1B2F]/40 font-medium">Account Role</span>
                        <p class="text-sm font-bold text-[#1B1B2F] capitalize mt-1">{{ $registration->user->role ?? 'Student' }}</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Status & Payment (1 Col) -->
        <div class="space-y-6">

            <!-- Status & Management Widget -->
            <div class="bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-sm p-6 space-y-5">
                <h3 class="text-[10px] font-bold text-[#1B1B2F]/40 uppercase tracking-wider pb-3 border-b-2 border-dashed border-[#C9C2AE]" style="font-family:'Space Mono',monospace;">Pass Status</h3>

                <div>
                    <label class="text-xs text-[#1B1B2F]/40 font-medium">Current Status</label>
                    <div class="mt-2">
                        @php
                            $statusClasses = [
                                'confirmed' => 'border-[#4B7A5D] text-[#4B7A5D]',
                                'pending'   => 'border-[#E8A33D] text-[#B87A1F]',
                                'cancelled' => 'border-[#C1443C] text-[#C1443C]',
                            ][$registration->status] ?? 'border-[#C9C2AE] text-[#1B1B2F]/50';
                        @endphp
                        <span class="inline-block px-3 py-1.5 rounded-lg text-xs font-bold border-2 uppercase tracking-wider {{ $statusClasses }}" style="font-family:'Space Mono',monospace; transform: rotate(-2deg);">
                            {{ $registration->status }}
                        </span>
                    </div>
                </div>

                <!-- Update Status Form -->
                <form action="{{ route('admin.registrations.update', $registration->id) }}" method="POST" class="space-y-3 pt-2">
                    @csrf
                    @method('PUT')

                    <label for="status" class="text-xs text-[#1B1B2F]/50 font-medium">Update Status</label>
                    <select name="status" id="status" class="w-full px-3 py-2 rounded-xl text-xs border border-[#C9C2AE]/70 bg-white focus:border-[#E8A33D] focus:ring-1 focus:ring-[#E8A33D]/30 outline-none">
                        <option value="confirmed" {{ $registration->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ $registration->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>

                    <button type="submit" class="w-full px-4 py-2.5 rounded-full text-xs font-semibold bg-[#1B1B2F] text-white hover:bg-[#E8A33D] hover:text-[#1B1B2F] transition-colors shadow-sm">
                        Save Changes
                    </button>
                </form>
            </div>

            <!-- Payment & Ticket Summary -->
            <div class="bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-sm p-6 space-y-4">
                <h3 class="text-[10px] font-bold text-[#1B1B2F]/40 uppercase tracking-wider pb-3 border-b-2 border-dashed border-[#C9C2AE]" style="font-family:'Space Mono',monospace;">Payment Breakdown</h3>

                <div class="space-y-2 text-xs">
                    <div class="flex justify-between text-[#1B1B2F]/50">
                        <span>Ticket Price</span>
                        <span class="font-bold text-[#1B1B2F]" style="font-family:'Space Mono',monospace;">
                            {{ isset($registration->event->price) && $registration->event->price > 0 ? number_format($registration->event->price, 2) . ' DH' : '0.00 DH' }}
                        </span>
                    </div>
                    <div class="flex justify-between text-[#1B1B2F]/50">
                        <span>Service Fee</span>
                        <span class="font-bold text-[#1B1B2F]" style="font-family:'Space Mono',monospace;">0.00 DH</span>
                    </div>
                    <div class="pt-2 border-t-2 border-dashed border-[#C9C2AE] flex justify-between text-sm font-bold text-[#1B1B2F]">
                        <span>Total Paid</span>
                        <span class="text-[#B87A1F]" style="font-family:'Space Mono',monospace;">
                            {{ isset($registration->event->price) && $registration->event->price > 0 ? number_format($registration->event->price, 2) . ' DH' : 'Free' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="bg-[#C1443C]/5 rounded-2xl border border-[#C1443C]/25 p-5 space-y-3">
                <h4 class="text-xs font-bold text-[#C1443C] uppercase tracking-wider" style="font-family:'Space Mono',monospace;">Danger Zone</h4>
                <p class="text-[11px] text-[#C1443C]/80 leading-relaxed">Permanently delete or cancel this registration record from the system.</p>

                <form action="{{ route('admin.registrations.destroy', $registration->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this registration?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-2 rounded-full text-xs font-semibold bg-[#C1443C] text-white hover:bg-[#a83a33] transition-colors shadow-sm">
                        Delete Registration
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection