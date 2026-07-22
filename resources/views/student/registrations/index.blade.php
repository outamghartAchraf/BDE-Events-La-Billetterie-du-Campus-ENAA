@extends('layouts.student')
@section('title', 'My Event Tickets')
@section('page-title', 'My Tickets')

@section('content')
<div class="space-y-6">
    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-base font-bold text-gray-900">My Reserved Tickets</h2>
            <p class="text-xs text-gray-400 mt-0.5">View and manage all your active event passes</p>
        </div>

        <!-- Filter/Search -->
        <form method="GET" action="{{ route('student.registrations.index') }}" class="flex items-center gap-3">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by event or code..." class="pl-9 pr-4 py-2 bg-white border border-gray-200/80 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder:text-gray-400 shadow-xs">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-xs rounded-xl transition-all shadow-xs">
                Search
            </button>
        </form>
    </div>

 
    <!-- Tickets Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($registrations as $registration)
            <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col group">
                <!-- Header Status Banner -->
                <div class="p-4 bg-slate-900 text-white flex items-center justify-between">
                    <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400">Ref: {{ $registration->code }}</span>
                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold {{ strtolower($registration->status ?? 'confirmed') === 'confirmed' ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' : 'bg-amber-500/20 text-amber-300 border border-amber-500/30' }}">
                        {{ ucfirst($registration->status ?? 'Confirmed') }}
                    </span>
                </div>

                <!-- Ticket Content -->
                <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                    <div class="space-y-2">
                        <h3 class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors line-clamp-1">{{ $registration->event->title }}</h3>
                        <p class="text-xs text-gray-500 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $registration->event->location }}
                        </p>
                    </div>

                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                        <span>Date: {{ $registration->event->date }}</span>
                        <span class="font-bold text-gray-900">{{ $registration->event->price > 0 ? number_format($registration->event->price, 2) . ' DH' : 'Free' }}</span>
                    </div>

                    <a href="{{ route('student.registrations.show', $registration->id) }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-200">
                        View Digital Pass
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl border border-gray-200/80 p-12 text-center text-gray-400">
                <svg class="w-12 h-12 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2 2 2 0 012 2 2 2 0 01-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 01-2-2 2 2 0 012-2V7a2 2 0 00-2-2H5z"/></svg>
                <h3 class="mt-3 text-sm font-bold text-gray-800">No Tickets Reserved</h3>
                <p class="mt-1 text-xs text-gray-400">You haven't registered for any events yet.</p>
                <a href=" " class="inline-block mt-4 px-4 py-2 rounded-xl bg-indigo-600 text-white text-xs font-semibold hover:bg-indigo-700 transition-colors">
                    Explore Events
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    {{-- @if(method_exists($registrations, 'links'))
        <div class="pt-4">
            {{ $registrations->links() }}
        </div>
    @endif --}}
</div>
@endsection