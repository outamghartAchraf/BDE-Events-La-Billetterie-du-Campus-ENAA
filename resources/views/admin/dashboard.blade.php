@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="space-y-10" style="font-family:'Inter',sans-serif;">

    <!-- Ledger strip -->
    <div class="flex items-center justify-between border-b-2 border-dashed border-[#C9C2AE] pb-4">
        <div>
            <span class="text-[10px] font-bold uppercase tracking-[0.25em] text-[#C1443C]" style="font-family:'Space Mono',monospace;">Manifeste du jour</span>
            <p class="text-xl font-bold text-[#1B1B2F] mt-1" style="font-family:'Fraunces',serif;">Vue d'ensemble</p>
        </div>
        <span class="text-[11px] text-[#1B1B2F]/40" style="font-family:'Space Mono',monospace;">{{ now()->format('d.m.Y') }}</span>
    </div>

    <!-- Statistics Cards — ticket-stub style -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Total Events -->
        <div class="relative bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden">
            <div class="p-5 flex items-center justify-between">
                <span class="text-[10px] font-bold text-[#1B1B2F]/40 uppercase tracking-wider" style="font-family:'Space Mono',monospace;">Total Events</span>
                <div class="w-10 h-10 rounded-full bg-[#E8A33D]/10 text-[#E8A33D] flex items-center justify-center group-hover:scale-110 group-hover:bg-[#E8A33D] group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="relative border-t border-dashed border-[#C9C2AE] px-5 py-4">
                <div class="absolute -left-3 -top-3 w-6 h-6 rounded-full bg-[#FAF7EF]"></div>
                <div class="absolute -right-3 -top-3 w-6 h-6 rounded-full bg-[#FAF7EF]"></div>
                <span class="text-3xl font-black text-[#1B1B2F] tracking-tight" style="font-family:'Space Mono',monospace;">{{ $totalEvents ?? 0 }}</span>
            </div>
        </div>

        <!-- Registrations -->
        <div class="relative bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden">
            <div class="p-5 flex items-center justify-between">
                <span class="text-[10px] font-bold text-[#1B1B2F]/40 uppercase tracking-wider" style="font-family:'Space Mono',monospace;">Registrations</span>
                <div class="w-10 h-10 rounded-full bg-[#C1443C]/10 text-[#C1443C] flex items-center justify-center group-hover:scale-110 group-hover:bg-[#C1443C] group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/></svg>
                </div>
            </div>
            <div class="relative border-t border-dashed border-[#C9C2AE] px-5 py-4">
                <div class="absolute -left-3 -top-3 w-6 h-6 rounded-full bg-[#FAF7EF]"></div>
                <div class="absolute -right-3 -top-3 w-6 h-6 rounded-full bg-[#FAF7EF]"></div>
                <span class="text-3xl font-black text-[#1B1B2F] tracking-tight" style="font-family:'Space Mono',monospace;">{{ $totalRegistrations ?? 0 }}</span>
            </div>
        </div>

        <!-- Students -->
        <div class="relative bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden">
            <div class="p-5 flex items-center justify-between">
                <span class="text-[10px] font-bold text-[#1B1B2F]/40 uppercase tracking-wider" style="font-family:'Space Mono',monospace;">Students</span>
                <div class="w-10 h-10 rounded-full bg-[#1B1B2F]/5 text-[#1B1B2F] flex items-center justify-center group-hover:scale-110 group-hover:bg-[#1B1B2F] group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
            </div>
            <div class="relative border-t border-dashed border-[#C9C2AE] px-5 py-4">
                <div class="absolute -left-3 -top-3 w-6 h-6 rounded-full bg-[#FAF7EF]"></div>
                <div class="absolute -right-3 -top-3 w-6 h-6 rounded-full bg-[#FAF7EF]"></div>
                <span class="text-3xl font-black text-[#1B1B2F] tracking-tight" style="font-family:'Space Mono',monospace;">{{ $totalStudents ?? 0 }}</span>
            </div>
        </div>

        <!-- Revenue -->
 
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <a href="{{ route('events.create') }}" class="group bg-white p-5 rounded-2xl border border-[#C9C2AE]/60 shadow-sm hover:border-[#E8A33D]/60 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-[#1B1B2F] text-[#E8A33D] flex items-center justify-center group-hover:scale-105 transition-transform shadow-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div>
                <h3 class="text-sm font-bold text-[#1B1B2F] group-hover:text-[#C1443C] transition-colors" style="font-family:'Fraunces',serif;">Create New Event</h3>
                <p class="text-xs text-[#1B1B2F]/50 mt-0.5">Publish and configure new campus activities for students.</p>
            </div>
        </a>

        <a href="{{ route('events.index') }}" class="group bg-white p-5 rounded-2xl border border-[#C9C2AE]/60 shadow-sm hover:border-[#E8A33D]/60 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-[#C1443C] text-white flex items-center justify-center group-hover:scale-105 transition-transform shadow-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <h3 class="text-sm font-bold text-[#1B1B2F] group-hover:text-[#C1443C] transition-colors" style="font-family:'Fraunces',serif;">Manage Events</h3>
                <p class="text-xs text-[#1B1B2F]/50 mt-0.5">View, edit, filter or delete existing event records.</p>
            </div>
        </a>
    </div>

    <!-- Recent Events Table — manifest style -->
    <div class="bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-sm overflow-hidden">
        <div class="p-5 border-b-2 border-dashed border-[#C9C2AE] flex items-center justify-between">
            <div>
                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#C1443C]" style="font-family:'Space Mono',monospace;">Manifeste</span>
                <h3 class="text-sm font-bold text-[#1B1B2F] mt-0.5" style="font-family:'Fraunces',serif;">Recent Events</h3>
            </div>
            <a href="{{ route('events.index') }}" class="text-xs font-bold text-[#1B1B2F] hover:text-[#C1443C] transition-colors">View All →</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#FAF7EF] border-b border-[#C9C2AE]/60 text-[10px] font-bold text-[#1B1B2F]/40 uppercase tracking-wider" style="font-family:'Space Mono',monospace;">
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Location</th>
                        <th class="px-6 py-3">Price</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-dashed divide-[#C9C2AE]/70 text-xs">
                    @forelse($recentEvents ?? [] as $event)
                        <tr class="hover:bg-[#FAF7EF]/60 transition-colors">
                            <td class="px-6 py-3.5 font-semibold text-[#1B1B2F]">{{ $event->title }}</td>
                            <td class="px-6 py-3.5 text-[#1B1B2F]/60" style="font-family:'Space Mono',monospace;">{{ $event->date }}</td>
                            <td class="px-6 py-3.5 text-[#1B1B2F]/60">{{ $event->location }}</td>
                            <td class="px-6 py-3.5">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold border-2 border-[#C1443C] text-[#C1443C]" style="font-family:'Space Mono',monospace; transform: rotate(-3deg); display:inline-block;">
                                    {{ number_format($event->price, 2) }} DH
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-[#1B1B2F]/30">
                                <p class="text-xs font-medium">No recent events found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection