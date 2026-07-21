@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="space-y-8">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Total Events -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Events</span>
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $totalEvents ?? 0 }}</span>
            </div>
        </div>

        <!-- Registrations -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Registrations</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/></svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $totalRegistrations ?? 0 }}</span>
            </div>
        </div>

        <!-- Students -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Students</span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $totalStudents ?? 0 }}</span>
            </div>
        </div>

        <!-- Revenue -->
        <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Revenue</span>
                <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-sky-600 group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-baseline gap-1">
                <span class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $totalRevenue ?? 0 }}</span>
                <span class="text-xs font-bold text-gray-400">DH</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <a href="{{ route('events.create') }}" class="group bg-white p-5 rounded-2xl border border-gray-200/80 shadow-xs hover:border-indigo-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-600 text-white flex items-center justify-center group-hover:scale-105 transition-transform shadow-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div>
                <h3 class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">Create New Event</h3>
                <p class="text-xs text-gray-500 mt-0.5">Publish and configure new campus activities for students.</p>
            </div>
        </a>

        <a href="{{ route('events.index') }}" class="group bg-white p-5 rounded-2xl border border-gray-200/80 shadow-xs hover:border-indigo-500/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-slate-900 text-white flex items-center justify-center group-hover:scale-105 transition-transform shadow-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <h3 class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">Manage Events</h3>
                <p class="text-xs text-gray-500 mt-0.5">View, edit, filter or delete existing event records.</p>
            </div>
        </a>
    </div>

    <!-- Recent Events Table -->
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xs overflow-hidden">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h3 class="text-sm font-bold text-gray-900">Recent Events</h3>
                <p class="text-xs text-gray-400 mt-0.5">Overview of recently added campus events.</p>
            </div>
            <a href="{{ route('events.index') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">View All →</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Location</th>
                        <th class="px-6 py-3">Price</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs">
                    @forelse($recentEvents ?? [] as $event)
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-3.5 font-semibold text-gray-900">{{ $event->title }}</td>
                            <td class="px-6 py-3.5 text-gray-600">{{ $event->date }}</td>
                            <td class="px-6 py-3.5 text-gray-600">{{ $event->location }}</td>
                            <td class="px-6 py-3.5">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-semibold bg-gray-100 text-gray-800 border border-gray-200">
                                    {{ number_format($event->price, 2) }} DH
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-400">
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