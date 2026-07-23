<header class="sticky top-0 z-30 h-[72px] bg-white/90 backdrop-blur-md border-b-2 border-dashed border-[#C9C2AE] px-8 flex items-center justify-between transition-all" style="font-family:'Inter',sans-serif;">
    <!-- Title Section -->
    <div>
        <h1 class="text-base font-bold text-[#1B1B2F] tracking-tight" style="font-family:'Fraunces',serif;">
            @yield('page-title', 'Dashboard')
        </h1>
        <p class="text-xs text-[#1B1B2F]/40 font-medium">
            Welcome back, <span class="text-[#1B1B2F]/80 font-semibold">{{ auth()->user()->name }}</span>
        </p>
    </div>

    <!-- Actions & User Profile -->
    <div class="flex items-center gap-3">
        <!-- Search Bar -->
        <div class="relative w-60">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-[#1B1B2F]/30">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </span>
            <input type="text" placeholder="Search events, students..." class="w-full pl-8 pr-3 py-1.5 text-xs bg-[#FAF7EF] border border-[#C9C2AE]/70 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E8A33D]/25 focus:border-[#E8A33D] transition-all placeholder:text-[#1B1B2F]/30">
        </div>

        <!-- Notifications Icon -->
        <button class="relative p-2 rounded-xl text-[#1B1B2F]/50 hover:text-[#1B1B2F] hover:bg-[#FAF7EF] transition-all border border-transparent hover:border-[#C9C2AE]/60">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 11-6 0h6z"/></svg>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-[#C1443C] ring-2 ring-white"></span>
        </button>

        <!-- Settings Icon -->
        <button class="p-2 rounded-xl text-[#1B1B2F]/50 hover:text-[#1B1B2F] hover:bg-[#FAF7EF] transition-all border border-transparent hover:border-[#C9C2AE]/60">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </button>

        <div class="h-5 w-px bg-[#C9C2AE]"></div>

        <!-- Avatar & Dropdown Placeholder -->
        <div class="flex items-center gap-2 cursor-pointer p-1 rounded-xl hover:bg-[#FAF7EF] transition-all">
            <div class="w-8 h-8 rounded-full bg-[#1B1B2F] text-[#E8A33D] flex items-center justify-center font-bold text-xs shadow-sm" style="font-family:'Fraunces',serif;">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <svg class="w-3.5 h-3.5 text-[#1B1B2F]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </div>
    </div>
</header>