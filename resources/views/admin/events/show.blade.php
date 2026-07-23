@extends('layouts.admin')
@section('title', 'Event Details')
@section('page-title', 'Event Details')

@section('content')
<div class="max-w-5xl mx-auto space-y-6" style="font-family:'Inter',sans-serif;">
    <!-- Event Details Hero Header -->
    <div class="relative overflow-hidden rounded-3xl bg-[#1B1B2F] p-8 text-white shadow-xl">
        <div class="absolute -right-10 -bottom-10 w-72 h-72 bg-[#E8A33D]/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="px-3 py-1 text-[11px] font-bold uppercase tracking-widest bg-[#E8A33D]/15 text-[#E8A33D] rounded-full border border-[#E8A33D]/30" style="font-family:'Space Mono',monospace;">Event Overview</span>
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight mt-3" style="font-family:'Fraunces',serif;">
                    {{ $event->title }}
                </h2>
                <p class="text-xs text-white/40 mt-1 flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-[#E8A33D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $event->location }}
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('events.edit', $event) }}"
                   class="px-4 py-2.5 bg-[#E8A33D] hover:bg-[#F0BB66] text-[#1B1B2F] rounded-full font-semibold text-xs transition-all shadow-md flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit Event
                </a>
            </div>
        </div>
    </div>

    <!-- Description & Statistics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Description Card -->
        <div class="md:col-span-2 bg-white rounded-2xl p-6 border border-[#C9C2AE]/60 shadow-sm space-y-3">
            <h3 class="text-[10px] font-bold uppercase tracking-wider text-[#1B1B2F]/40" style="font-family:'Space Mono',monospace;">Description</h3>
            <p class="text-[#1B1B2F]/70 text-xs leading-relaxed whitespace-pre-line">
                {{ $event->description }}
            </p>
        </div>

        <!-- Specifications Statistics Card -->
        <div class="bg-white rounded-2xl p-6 border border-[#C9C2AE]/60 shadow-sm space-y-4">
            <h3 class="text-[10px] font-bold uppercase tracking-wider text-[#1B1B2F]/40" style="font-family:'Space Mono',monospace;">Specifications</h3>

            <div class="space-y-3 divide-y divide-dashed divide-[#C9C2AE]/70 text-xs">
                <div class="pt-2 flex justify-between items-center">
                    <span class="text-[#1B1B2F]/50">Date</span>
                    <span class="font-semibold text-[#1B1B2F]">{{ $event->date }}</span>
                </div>
                <div class="pt-2 flex justify-between items-center">
                    <span class="text-[#1B1B2F]/50">Time</span>
                    <span class="font-semibold text-[#1B1B2F]" style="font-family:'Space Mono',monospace;">{{ $event->time }}</span>
                </div>
                <div class="pt-2 flex justify-between items-center">
                    <span class="text-[#1B1B2F]/50">Price</span>
                    <span class="font-bold text-[#C1443C] border-2 border-[#C1443C] px-2 py-0.5 rounded-md inline-block" style="font-family:'Space Mono',monospace; transform: rotate(-3deg);">{{ number_format($event->price, 2) }} DH</span>
                </div>
                <div class="pt-2 flex justify-between items-center">
                    <span class="text-[#1B1B2F]/50">Capacity</span>
                    <span class="font-bold text-[#B87A1F] bg-[#E8A33D]/10 px-2 py-0.5 rounded-md border border-[#E8A33D]/30">{{ $event->capacity }} Attendees</span>
                </div>
                <div class="pt-2 flex justify-between items-center">
                    <span class="text-[#1B1B2F]/50">Created At</span>
                    <span class="font-medium text-[#1B1B2F]/60">{{ $event->created_at->format('d M Y') }}</span>
                </div>
                <div class="pt-2 flex justify-between items-center">
                    <span class="text-[#1B1B2F]/50">Last Update</span>
                    <span class="font-medium text-[#1B1B2F]/60">{{ $event->updated_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions Footer Bar -->
    <div class="bg-white rounded-2xl p-6 border border-[#C9C2AE]/60 shadow-sm flex items-center justify-between">
        <a href="{{ route('events.index') }}"
           class="px-5 py-2.5 rounded-full border border-[#C9C2AE] text-[#1B1B2F]/60 hover:bg-[#FAF7EF] font-semibold text-xs transition-all inline-flex items-center gap-2">
            ← Back
        </a>

        <form action="{{ route('events.destroy', $event) }}"
              method="POST"
              onsubmit="return confirm('Delete this event?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-5 py-2.5 rounded-full bg-[#C1443C] hover:bg-[#a83a33] text-white font-semibold text-xs transition-all shadow-md inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                Delete Event
            </button>
        </form>
    </div>
</div>
@endsection