<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Student Portal') - University Platform</title>
    <!-- Fonts & Tailwind CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full font-['Inter',sans-serif] text-gray-800 antialiased bg-gray-50">
    <div class="min-h-full flex">
        <!-- Fixed Sidebar (220px) -->
        <aside class="w-[220px] bg-white border-r border-gray-200/80 fixed inset-y-0 left-0 z-30 flex flex-col justify-between shadow-xs">
            <div>
                <!-- Brand / Logo -->
                <div class="h-[72px] px-6 flex items-center gap-3 border-b border-gray-100">
                    <div class="w-9 h-9 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-black text-lg shadow-md shadow-indigo-200">
                        U
                    </div>
                    <div>
                        <span class="text-sm font-extrabold text-gray-900 tracking-tight block leading-tight">UniPlatform</span>
                        <span class="text-[10px] font-semibold text-indigo-600 uppercase tracking-wider block">Student Portal</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="p-4 space-y-1.5">
                    <a href=" " 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 {{ request()->routeIs('student.dashboard') ? 'bg-indigo-50 text-indigo-600 font-bold shadow-xs' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('student.dashboard') ? 'text-indigo-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 00-1 1m-6 0h6"/></svg>
                        Dashboard
                    </a>

                    <a href="{{ route('student.events.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 {{ request()->routeIs('student.events.*') ? 'bg-indigo-50 text-indigo-600 font-bold shadow-xs' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('student.events.*') ? 'text-indigo-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
                        Events
                    </a>

                    <a href="{{ route('student.tickets.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 {{ request()->routeIs('student.tickets.*') ? 'bg-indigo-50 text-indigo-600 font-bold shadow-xs' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('student.tickets.*') ? 'text-indigo-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2 2 2 0 012 2 2 2 0 01-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 01-2-2 2 2 0 012-2V7a2 2 0 00-2-２H5z"/></svg>
                        My Tickets
                    </a>

                    <a href=" " 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 {{ request()->routeIs('student.profile.*') ? 'bg-indigo-50 text-indigo-600 font-bold shadow-xs' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('student.profile.*') ? 'text-indigo-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Profile
                    </a>
                </nav>
            </div>

            <!-- Profile Bottom Bar & Logout -->
            <div class="p-4 border-t border-gray-100 space-y-3">
                <div class="flex items-center gap-3 p-2 rounded-xl bg-gray-50/80 border border-gray-100">
                    <img class="w-8 h-8 rounded-lg object-cover ring-2 ring-indigo-500/20" src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=6366f1&color=fff' }}" alt="{{ auth()->user()->name }}">
                    <div class="min-w-0 flex-1">
                        <p class="text-xs font-bold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                        <span class="inline-block text-[9px] font-semibold text-indigo-600 uppercase tracking-wider">Student</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-medium text-rose-600 hover:bg-rose-50 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="pl-[220px] flex-1 flex flex-col min-w-0">
            <!-- Sticky Navbar (72px height) -->
            <header class="h-[72px] sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-gray-200/80 px-8 flex items-center justify-between">
                <div>
                    <h1 class="text-sm font-bold text-gray-900">@yield('page-title', 'Student Portal')</h1>
                    <p class="text-xs text-gray-400 mt-0.5">Welcome back to your campus dashboard</p>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Search Bar -->
                    <div class="relative hidden sm:block w-64">
                        <input type="text" placeholder="Search events, tickets..." class="w-full pl-9 pr-4 py-2 bg-gray-50 border border-gray-200/80 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder:text-gray-400">
                        <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>

                    <!-- Notification Button -->
                    <button type="button" class="relative p-2 rounded-xl text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-indigo-600 rounded-full"></span>
                    </button>

                    <div class="h-6 w-px bg-gray-200"></div>

                    <!-- User Menu Dropdown Placeholder -->
                    <a href=" " class="flex items-center gap-3 group">
                        <img class="w-8 h-8 rounded-lg object-cover ring-2 ring-indigo-500/20 group-hover:ring-indigo-500 transition-all" src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=6366f1&color=fff' }}" alt="{{ auth()->user()->name }}">
                        <span class="text-xs font-bold text-gray-900 group-hover:text-indigo-600 transition-colors hidden sm:block">{{ auth()->user()->name }}</span>
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-8 flex-1">
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center justify-between shadow-xs">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center justify-between shadow-xs">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>