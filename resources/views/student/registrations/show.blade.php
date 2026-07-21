@extends('layouts.student')
@section('title', 'Digital Event Pass')
@section('page-title', 'Ticket Pass Details')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Back Button -->
    <a href="{{ route('student.registrations.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-gray-500 hover:text-indigo-600 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to My Tickets
    </a>

    <!-- Premium Digital Ticket Pass -->
    <div class="bg-white rounded-3xl border border-gray-200/80 shadow-2xl overflow-hidden">
        <!-- Pass Header -->
        <div class="bg-gradient-to-r from-indigo-900 via-indigo-800 to-slate-900 p-8 text-white relative">
            <div class="flex items-center justify-between">
                <span class="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-widest bg-white/10 border border-white/20">Official Pass</span>
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-xs">
                    {{ ucfirst($registration->status ?? 'Confirmed') }}
                </span>
            </div>
            <h2 class="text-2xl font-extrabold tracking-tight mt-6">{{ $registration->event->title }}</h2>
            <p class="text-xs text-indigo-200 mt-1 flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{ $registration->event->location }}
            </p>
        </div>

        <!-- Ticket Cutout Pattern visual separator -->
        <div class="relative bg-white h-4 border-b border-dashed border-gray-200 flex justify-between items-center px-4">
            <div class="w-6 h-6 rounded-full bg-gray-50 -ml-7 border-r border-gray-200/80"></div>
            <div class="w-6 h-6 rounded-full bg-gray-50 -mr-7 border-l border-gray-200/80"></div>
        </div>

        <!-- Pass Body -->
        <div class="p-8 space-y-8">
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 text-xs">
                <div>
                    <span class="text-gray-400 font-medium block">Attendee</span>
                    <span class="font-extrabold text-gray-900 mt-0.5 block">{{ auth()->user()->name }}</span>
                </div>
                <div>
                    <span class="text-gray-400 font-medium block">Reservation Code</span>
                    <span class="font-mono font-bold text-indigo-600 mt-0.5 block">{{ $registration->code }}</span>
                </div>
                <div>
                    <span class="text-gray-400 font-medium block">Price</span>
                    <span class="font-extrabold text-gray-900 mt-0.5 block">{{ $registration->event->price > 0 ? number_format($registration->event->price, 2) . ' DH' : 'Free' }}</span>
                </div>
                <div>
                    <span class="text-gray-400 font-medium block">Date</span>
                    <span class="font-bold text-gray-800 mt-0.5 block">{{ $registration->event->date }}</span>
                </div>
                <div>
                    <span class="text-gray-400 font-medium block">Time</span>
                    <span class="font-bold text-gray-800 mt-0.5 block">{{ $registration->event->time ?? '10:00 AM' }}</span>
                </div>
                <div>
                    <span class="text-gray-400 font-medium block">Issued On</span>
                    <span class="font-bold text-gray-800 mt-0.5 block">{{ $registration->created_at ? $registration->created_at->format('M d, Y') : now()->format('M d, Y') }}</span>
                </div>
            </div>

            <!-- QR Code Placeholder -->
            <div class="pt-6 border-t border-gray-100 flex flex-col items-center justify-center text-center space-y-3">
                <div class="p-4 bg-white rounded-2xl border-2 border-dashed border-gray-200 shadow-xs inline-block">
                    <!-- Stylized SVG QR Placeholder -->
                    <svg class="w-32 h-32 text-gray-800" viewBox="0 0 100 100" fill="currentColor">
                        <path d="M0,0 h30 v30 h-30 z M5,5 v20 h20 v-20 z M10,10 h10 v10 h-10 z" />
                        <path d="M70,0 h30 v30 h-30 z M75,5 v20 h20 v-20 z M80,10 h10 v10 h-10 z" />
                        <path d="M0,70 h30 v30 h-30 z M5,75 v20 h20 v-20 z M10,80 h10 v10 h-10 z" />
                        <rect x="35" y="5" width="10" height="20" />
                        <rect x="50" y="15" width="15" height="10" />
                        <rect x="35" y="35" width="30" height="10" />
                        <rect x="70" y="35" width="25" height="10" />
                        <rect x="5" y="35" width="20" height="10" />
                        <rect x="35" y="50" width="10" height="45" />
                        <rect x="50" y="50" width="20" height="10" />
                        <rect x="75" y="50" width="20" height="20" />
                        <rect x="50" y="75" width="45" height="20" />
                    </svg>
                </div>
                <span class="text-[11px] font-mono font-semibold text-gray-400">Scan at entrance for verification</span>
            </div>

            <!-- Download Action -->
            <div class="pt-4 border-t border-gray-100">
                <a href="{{ route('student.registrations.pdf', $registration->id) }}" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-xs font-bold bg-indigo-600 text-white hover:bg-indigo-700 transition-all shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Download PDF Pass
                </a>
            </div>
        </div>
    </div>
</div>
@endsection