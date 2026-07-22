@extends('layouts.admin') {{-- Adjust to your actual admin layout path --}}
@section('title', 'Manage Registrations')
@section('page-title', 'Event Registrations')

@section('content')
<div class="space-y-6">

    <!-- Header Actions & Search Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-gray-900 tracking-tight">All Registrations</h2>
            <p class="text-xs text-gray-500 mt-1">Monitor, filter, and manage student event tickets and pass statuses.</p>
        </div>

 
    </div>

    <!-- Filters & Search Form -->
    <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs">
        <form method="GET" action="{{ route('admin.registrations.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- Search Keyword -->
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search attendee name or code..." 
                       class="w-full pl-10 pr-4 py-2 rounded-xl text-xs border border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <!-- Filter by Event -->
            <div>
                <select name="event_id" class="w-full px-3 py-2 rounded-xl text-xs border border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none bg-white">
                    <option value="">All Events</option>
                    @foreach($events ?? [] as $event)
                        <option value="{{ $event->id }}" {{ request('event_id') == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filter by Status -->
            <div>
                <select name="status" class="w-full px-3 py-2 rounded-xl text-xs border border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none bg-white">
                    <option value="">All Statuses</option>
                    <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <!-- Submit Filter Button -->
            <div class="flex items-center gap-2">
                <button type="submit" class="w-full px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 text-white hover:bg-indigo-700 transition-colors shadow-xs">
                    Apply Filters
                </button>
                @if(request()->hasAny(['search', 'event_id', 'status']))
                    <a href="{{ route('admin.registrations.index') }}" class="px-3 py-2 rounded-xl text-xs font-semibold bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Registrations Data Table -->
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                        <th class="py-3.5 px-5">Ticket Code</th>
                        <th class="py-3.5 px-5">Attendee</th>
                        <th class="py-3.5 px-5">Event Details</th>
                        <th class="py-3.5 px-5">Status</th>
                        <th class="py-3.5 px-5">Reserved Date</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs text-gray-700">
                    @forelse($registrations as $registration)
                        <tr class="hover:bg-gray-50/60 transition-colors">
                            
                            <!-- Ticket Code -->
                            <td class="py-4 px-5 font-mono font-bold text-indigo-600">
                                {{ $registration->code ?? ('REF-' . $registration->id) }}
                            </td>

                            <!-- User Info -->
                            <td class="py-4 px-5">
                                <div class="font-bold text-gray-900">{{ $registration->user->name ?? 'Guest User' }}</div>
                                <div class="text-[11px] text-gray-400 mt-0.5">{{ $registration->user->email ?? 'N/A' }}</div>
                            </td>

                            <!-- Event Info -->
                            <td class="py-4 px-5">
                                <div class="font-bold text-gray-900 line-clamp-1">{{ $registration->event->title ?? 'N/A' }}</div>
                                <div class="text-[11px] text-gray-400 mt-0.5">
                                    {{ $registration->event->date ?? '' }} • 
                                    {{ isset($registration->event->price) && $registration->event->price > 0 ? number_format($registration->event->price, 2) . ' DH' : 'Free' }}
                                </div>
                            </td>

                            <!-- Status Badge -->
                            <td class="py-4 px-5">
                                @php
                                    $statusClasses = [
                                        'confirmed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                        'pending'   => 'bg-amber-50 text-amber-700 border-amber-200',
                                        'cancelled' => 'bg-rose-50 text-rose-700 border-rose-200',
                                    ][$registration->status] ?? 'bg-gray-50 text-gray-600 border-gray-200';
                                @endphp
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold border uppercase tracking-wider {{ $statusClasses }}">
                                    {{ $registration->status }}
                                </span>
                            </td>

                            <!-- Created At -->
                            <td class="py-4 px-5 text-gray-500">
                                {{ $registration->created_at ? $registration->created_at->format('M d, Y • H:i') : 'N/A' }}
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-5 text-right">
                                <div class="inline-flex items-center gap-2">
   

                           <!-- View Registration Details -->
<a href="{{ route('admin.registrations.show', $registration) }}" title="View Registration Details"
   class="p-2 rounded-lg bg-gray-50 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
    </svg>
</a>

                                    <!-- Delete / Cancel Action -->
                                    <form action="{{ route('admin.registrations.destroy', $registration) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this registration?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Cancel Registration" class="p-2 rounded-lg bg-gray-50 text-gray-600 hover:bg-rose-50 hover:text-rose-600 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-gray-400">
                                <svg class="w-10 h-10 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2 2 2 0 012 2 2 2 0 01-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 01-2-2 2 2 0 012-2V7a2 2 0 00-2-2H5z"/></svg>
                                <p class="mt-2 text-xs font-medium text-gray-500">No registrations found matching your criteria.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Footer -->
        @if(method_exists($registrations, 'hasPages') && $registrations->hasPages())
            <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                {{ $registrations->withQueryString()->links() }}
            </div>
        @endif
    </div>

</div>
@endsection