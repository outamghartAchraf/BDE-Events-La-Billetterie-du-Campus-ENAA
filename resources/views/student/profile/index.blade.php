@extends('layouts.student')
@section('title', 'My Profile')
@section('page-title', 'Student Profile')

@section('content')
    <div class="max-w-4xl mx-auto space-y-8">
        <!-- Profile Header Card -->
        <div class="bg-white rounded-3xl border border-gray-200/80 shadow-xs p-8 relative overflow-hidden">
            <div class="flex flex-col sm:flex-row items-center gap-6 z-10 relative">
                <img class="w-24 h-24 rounded-2xl object-cover ring-4 ring-indigo-500/10 shadow-md"
                    src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=6366f1&color=fff' }}"
                    alt="{{ auth()->user()->name }}">

                <div class="text-center sm:text-left space-y-1.5 flex-1">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                        <h2 class="text-xl font-extrabold text-gray-900">{{ auth()->user()->name }}</h2>
                        <span
                            class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-indigo-50 text-indigo-600 border border-indigo-100 w-max mx-auto sm:mx-0">
                            Enrolled Student
                        </span>
                    </div>
                    <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                    <p class="text-[11px] text-gray-400">Student ID:
                        {{ auth()->user()->student_id ?? 'STU-' . auth()->user()->id }}</p>
                </div>

                <div>
                    <a href="{{ route('student.profile.edit') }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold bg-indigo-600 text-white hover:bg-indigo-700 transition-all shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
<!-- Stats Row -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

    <!-- Registered Events -->
    <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs">
        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">
            Registered Events
        </span>

        <p class="text-2xl font-extrabold text-gray-900 mt-2">
            {{ $registrationsCount }}
        </p>
    </div>

    <!-- Upcoming Events -->
    <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs">
        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">
            Upcoming Events
        </span>

        <p class="text-2xl font-extrabold text-gray-900 mt-2">
            {{ $upcomingEventsCount }}
        </p>
    </div>

    <!-- Account Status -->
    <div class="bg-white rounded-2xl p-5 border border-gray-200/80 shadow-xs">
        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">
            Account Status
        </span>

        <span class="inline-flex items-center mt-3 px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-sm font-semibold">
            ● Active
        </span>
    </div>

</div>

        <!-- Personal Details Section -->
        <div class="bg-white rounded-3xl border border-gray-200/80 shadow-xs p-8 space-y-6">
            <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">Account Information</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs">
                <div>
                    <span class="text-gray-400 font-medium block">Full Name</span>
                    <span class="font-semibold text-gray-900 mt-1 block">{{ auth()->user()->name }}</span>
                </div>

                <div>
                    <span class="text-gray-400 font-medium block">Email Address</span>
                    <span class="font-semibold text-gray-900 mt-1 block">{{ auth()->user()->email }}</span>
                </div>

                <div>
                    <span class="text-gray-400 font-medium block">Phone Number</span>
                    <span class="font-semibold text-gray-900 mt-1 block">
                        {{ auth()->user()->phone ?: 'Not provided' }}
                    </span>
                </div>

                <div>
                    <span class="text-gray-400 font-medium block">speciality</span>
                    <span
                        class="font-semibold text-gray-900 mt-1 block">{{ auth()->user()->speciality ?: 'Not provided' }}</span>
                </div>

                <div>
                    <span class="text-gray-400 font-medium block">Member Since</span>
                    <span class="font-semibold text-gray-900 mt-1 block">
                        {{ auth()->user()->created_at->format('d M Y') }}
                    </span>
                </div>

                <div>
                    <span class="text-gray-400 font-medium block">Role</span>
                    <span class="font-semibold text-gray-900 mt-1 block capitalize">
                        {{ auth()->user()->role }}
                    </span>
                </div>

            </div>


        </div>

    </div>
@endsection
