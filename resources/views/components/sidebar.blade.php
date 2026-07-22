<aside class="w-[220px] fixed top-0 bottom-0 left-0 bg-white border-r border-gray-200 flex flex-col justify-between z-40 transition-all duration-300">
    <div>
        <!-- Brand Header (Height aligned to Navbar) -->
        <div class="h-[72px] px-5 flex items-center gap-3 border-b border-gray-100">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-indigo-600 to-sky-400 flex items-center justify-center text-white font-extrabold text-base shadow-sm">
                B
            </div>
            <div>
                <h1 class="text-sm font-bold text-gray-900 tracking-tight leading-none">BDE Events</h1>
                <p class="text-[10px] text-gray-400 font-medium tracking-wider mt-0.5">ADMIN PANEL</p>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="p-3 space-y-1">
            <div class="px-3 py-2 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Navigation</div>

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <svg class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('events.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 group {{ request()->routeIs('admin.events.*') || request()->routeIs('events.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <svg class="w-4 h-4 {{ request()->routeIs('admin.events.*') || request()->routeIs('events.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/>
                </svg>
                <span>Events</span>
            </a>

            <a href="{{ route('admin.registrations.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 group {{ request()->routeIs('admin.registrations.index') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <svg class="w-4 h-4 {{ request()->routeIs('admin.registrations.index') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                </svg>
                <span>Registrations</span>
            </a>

            <a href=" "
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 group {{ request()->routeIs('admin.payments.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <svg class="w-4 h-4 {{ request()->routeIs('admin.payments.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
                <span>Payments</span>
            </a>
        </nav>
    </div>

    <!-- Bottom Profile Card -->
    <div class="p-3 m-3 rounded-2xl bg-gray-50 border border-gray-200/80">
        <div class="flex items-center gap-2.5 mb-2.5">
            <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center font-bold text-xs shadow-sm">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <h4 class="text-xs font-bold text-gray-900 truncate leading-tight">{{ auth()->user()->name }}</h4>
                <span class="inline-block text-[9px] font-semibold text-indigo-600 bg-indigo-100/60 px-1.5 py-0.5 rounded capitalize mt-0.5">
                    {{ auth()->user()->role }}
                </span>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full py-2 px-2.5 rounded-lg bg-white hover:bg-rose-50 border border-gray-200 hover:border-rose-200 text-rose-600 font-semibold text-[11px] flex items-center justify-center gap-2 transition-all shadow-xs">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Logout
            </button>
        </form>
    </div>
</aside>