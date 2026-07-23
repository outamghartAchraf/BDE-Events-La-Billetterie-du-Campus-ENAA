@extends('layouts.admin')
@section('title', 'Events')
@section('page-title', 'Events Management')

@section('content')
<div class="bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-sm overflow-hidden" style="font-family:'Inter',sans-serif;">
    <!-- Header Section with Controls -->
    <div class="p-6 border-b-2 border-dashed border-[#C9C2AE] flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#C1443C]" style="font-family:'Space Mono',monospace;">Manifeste</span>
            <h2 class="text-base font-bold text-[#1B1B2F] mt-0.5" style="font-family:'Fraunces',serif;">Campus Events</h2>
            <p class="text-xs text-[#1B1B2F]/50 mt-0.5">Manage and track all scheduled university activities.</p>
        </div>

        <div class="flex items-center gap-3">
            <!-- Table Search Bar -->
            <div class="relative w-48 sm:w-60">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-[#1B1B2F]/30">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <input type="text" placeholder="Filter table..." class="w-full pl-8 pr-3 py-2 text-xs bg-[#FAF7EF] border border-[#C9C2AE]/70 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E8A33D]/25 focus:border-[#E8A33D] transition-all">
            </div>

            <!-- Create Button -->
            <a href="{{ route('events.create') }}"
               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-[#1B1B2F] hover:bg-[#2A2A45] text-white font-semibold text-xs transition-all shadow-sm hover:-translate-y-0.5">
                <svg class="w-4 h-4 text-[#E8A33D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Create Event
            </a>
        </div>
    </div>

    <!-- Events Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#FAF7EF] border-b border-[#C9C2AE]/60 text-[10px] font-bold text-[#1B1B2F]/40 uppercase tracking-wider" style="font-family:'Space Mono',monospace;">
                    <th class="px-6 py-3.5">#</th>
                    <th class="px-6 py-3.5">Title</th>
                    <th class="px-6 py-3.5">Date & Time</th>
                    <th class="px-6 py-3.5">Location</th>
                    <th class="px-6 py-3.5">Price</th>
                    <th class="px-6 py-3.5">Capacity</th>
                    <th class="px-6 py-3.5 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-dashed divide-[#C9C2AE]/70 text-xs">
                @forelse($events as $event)
                    <tr class="hover:bg-[#FAF7EF]/60 transition-colors">
                        <td class="px-6 py-4 text-[#1B1B2F]/30" style="font-family:'Space Mono',monospace;">#{{ $event->id }}</td>
                        <td class="px-6 py-4 font-bold text-[#1B1B2F]" style="font-family:'Fraunces',serif;">{{ $event->title }}</td>
                        <td class="px-6 py-4 text-[#1B1B2F]/60">
                            <div class="font-semibold text-[#1B1B2F]/80">{{ $event->date }}</div>
                            <div class="text-[11px] text-[#1B1B2F]/40" style="font-family:'Space Mono',monospace;">{{ $event->time }}</div>
                        </td>
                        <td class="px-6 py-4 text-[#1B1B2F]/60">{{ $event->location }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold border-2 border-[#C1443C] text-[#C1443C]" style="font-family:'Space Mono',monospace; transform: rotate(-3deg); display:inline-block;">
                                {{ number_format($event->price, 2) }} DH
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-[#E8A33D]/10 text-[#B87A1F] border border-[#E8A33D]/30">
                                {{ $event->capacity }} places
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <!-- View Button -->
                                <a href="{{ route('events.show', $event) }}"
                                   class="p-1.5 text-[#1B1B2F]/30 hover:text-[#1B1B2F] hover:bg-[#FAF7EF] rounded-lg transition-colors" title="View Details">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('events.edit', $event) }}"
                                   class="p-1.5 text-[#1B1B2F]/30 hover:text-[#E8A33D] hover:bg-[#E8A33D]/10 rounded-lg transition-colors" title="Edit Event">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>

                                <!-- Delete Form Button -->
                                <form action="{{ route('events.destroy', $event) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this event?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-[#1B1B2F]/30 hover:text-[#C1443C] hover:bg-[#C1443C]/10 rounded-lg transition-colors" title="Delete Event">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="max-w-xs mx-auto space-y-2">
                                <div class="w-10 h-10 rounded-full bg-[#FAF7EF] border border-[#C9C2AE]/60 flex items-center justify-center mx-auto text-[#1B1B2F]/30">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                </div>
                                <p class="text-xs font-bold text-[#1B1B2F]/70" style="font-family:'Fraunces',serif;">No events found</p>
                                <p class="text-[11px] text-[#1B1B2F]/40">Get started by creating your first event layout.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Footer -->
    <div class="p-4 border-t-2 border-dashed border-[#C9C2AE] bg-[#FAF7EF]">
        {{ $events->links() }}
    </div>
</div>
@endsection