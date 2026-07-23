@extends('layouts.admin') {{-- Adjust to your actual admin layout path --}}
@section('title', 'Manage Registrations')
@section('page-title', 'Event Registrations')

@section('content')
<div class="space-y-6" style="font-family:'Inter',sans-serif;">

    <!-- Header Actions & Search Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#C1443C]" style="font-family:'Space Mono',monospace;">Souches détachées</span>
            <h2 class="text-xl font-bold text-[#1B1B2F] tracking-tight" style="font-family:'Fraunces',serif;">All Registrations</h2>
            <p class="text-xs text-[#1B1B2F]/50 mt-1">Monitor, filter, and manage student event tickets and pass statuses.</p>
        </div>


    </div>

    <!-- Filters & Search Form -->
    <div class="bg-white rounded-2xl p-5 border border-[#C9C2AE]/60 shadow-sm">
        <form method="GET" action="{{ route('admin.registrations.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            <!-- Search Keyword -->
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search attendee name or code..."
                       class="w-full pl-10 pr-4 py-2 rounded-xl text-xs border border-[#C9C2AE]/70 bg-[#FAF7EF] focus:bg-white focus:border-[#E8A33D] focus:ring-1 focus:ring-[#E8A33D]/30 outline-none transition-colors">
                <svg class="w-4 h-4 text-[#1B1B2F]/30 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <!-- Filter by Event -->
            <div>
                {{-- <select name="event_id" class="w-full px-3 py-2 rounded-xl text-xs border border-[#C9C2AE]/70 bg-white focus:border-[#E8A33D] focus:ring-1 focus:ring-[#E8A33D]/30 outline-none">
                    <option value="">All Events</option>
                    @foreach($events ?? [] as $event)
                        <option value="{{ $event->id }}" {{ request('event_id') == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}
                        </option>
                    @endforeach
                </select> --}}
            </div>

            <!-- Filter by Status -->
            <div>
                {{-- <select name="status" class="w-full px-3 py-2 rounded-xl text-xs border border-[#C9C2AE]/70 bg-white focus:border-[#E8A33D] focus:ring-1 focus:ring-[#E8A33D]/30 outline-none">
                    <option value="">All Statuses</option>
                    <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select> --}}
            </div>

            <!-- Submit Filter Button -->
            <div class="flex items-center gap-2">
                <button type="submit" class="w-full px-4 py-2 rounded-full text-xs font-semibold bg-[#1B1B2F] text-white hover:bg-[#2A2A45] transition-colors shadow-sm">
                    Apply Filters
                </button>
                @if(request()->hasAny(['search', 'event_id', 'status']))
                    <a href="{{ route('admin.registrations.index') }}" class="px-3 py-2 rounded-full text-xs font-semibold bg-[#FAF7EF] text-[#1B1B2F]/60 hover:bg-[#C9C2AE]/40 transition-colors">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Registrations Data Table -->
    <div class="bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#FAF7EF] border-b border-[#C9C2AE]/60 text-[10px] font-bold text-[#1B1B2F]/40 uppercase tracking-wider" style="font-family:'Space Mono',monospace;">
                        <th class="py-3.5 px-5">Ticket Code</th>
                        <th class="py-3.5 px-5">Attendee</th>
                        <th class="py-3.5 px-5">Event Details</th>
                        <th class="py-3.5 px-5">Status</th>
                        <th class="py-3.5 px-5">Reserved Date</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-dashed divide-[#C9C2AE]/70 text-xs text-[#1B1B2F]/70">
                    @forelse($registrations as $registration)
                        <tr class="hover:bg-[#FAF7EF]/60 transition-colors">

                            <!-- Ticket Code -->
                            <td class="py-4 px-5 font-bold text-[#B87A1F]" style="font-family:'Space Mono',monospace;">
                                {{ $registration->code ?? ('REF-' . $registration->id) }}
                            </td>

                            <!-- User Info -->
                            <td class="py-4 px-5">
                                <div class="font-bold text-[#1B1B2F]">{{ $registration->user->name ?? 'Guest User' }}</div>
                                <div class="text-[11px] text-[#1B1B2F]/40 mt-0.5">{{ $registration->user->email ?? 'N/A' }}</div>
                            </td>

                            <!-- Event Info -->
                            <td class="py-4 px-5">
                                <div class="font-bold text-[#1B1B2F] line-clamp-1" style="font-family:'Fraunces',serif;">{{ $registration->event->title ?? 'N/A' }}</div>
                                <div class="text-[11px] text-[#1B1B2F]/40 mt-0.5">
                                    {{ $registration->event->date ?? '' }} •
                                    {{ isset($registration->event->price) && $registration->event->price > 0 ? number_format($registration->event->price, 2) . ' DH' : 'Free' }}
                                </div>
                            </td>

                            <!-- Status Badge — stamped like a real pass -->
                            <td class="py-4 px-5">
                                @php
                                    $statusClasses = [
                                        'confirmed' => 'border-[#4B7A5D] text-[#4B7A5D]',
                                        'pending'   => 'border-[#E8A33D] text-[#B87A1F]',
                                        'cancelled' => 'border-[#C1443C] text-[#C1443C]',
                                    ][$registration->status] ?? 'border-[#C9C2AE] text-[#1B1B2F]/50';
                                @endphp
                                <span class="inline-block px-2.5 py-1 rounded-md text-[10px] font-bold border-2 uppercase tracking-wider {{ $statusClasses }}" style="font-family:'Space Mono',monospace; transform: rotate(-2deg);">
                                    {{ $registration->status }}
                                </span>
                            </td>

                            <!-- Created At -->
                            <td class="py-4 px-5 text-[#1B1B2F]/50">
                                {{ $registration->created_at ? $registration->created_at->format('M d, Y • H:i') : 'N/A' }}
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-5 text-right">
                                <div class="inline-flex items-center gap-2">

                                    <!-- View Registration Details -->
                                    <a href="{{ route('admin.registrations.show', $registration) }}" title="View Registration Details"
                                       class="p-2 rounded-lg bg-[#FAF7EF] text-[#1B1B2F]/50 hover:bg-[#1B1B2F] hover:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <!-- Delete / Cancel Action -->
                                    <form action="{{ route('admin.registrations.destroy', $registration) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this registration?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Cancel Registration" class="p-2 rounded-lg bg-[#FAF7EF] text-[#1B1B2F]/50 hover:bg-[#C1443C] hover:text-white transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center">
                                <svg class="w-10 h-10 mx-auto text-[#C9C2AE]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2 2 2 0 012 2 2 2 0 01-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 01-2-2 2 2 0 012-2V7a2 2 0 00-2-2H5z"/></svg>
                                <p class="mt-2 text-xs font-medium text-[#1B1B2F]/40">No registrations found matching your criteria.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Footer -->
        @if(method_exists($registrations, 'hasPages') && $registrations->hasPages())
            <div class="p-4 border-t-2 border-dashed border-[#C9C2AE] bg-[#FAF7EF]">
                {{ $registrations->withQueryString()->links() }}
            </div>
        @endif
    </div>

</div>
@endsection