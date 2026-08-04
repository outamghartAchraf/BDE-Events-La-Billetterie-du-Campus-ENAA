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

 

  
</div>
@endsection