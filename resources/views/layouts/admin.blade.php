<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - BDE Events</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full text-gray-900 font-sans antialiased bg-gray-50 selection:bg-indigo-500 selection:text-white">

<div class="flex min-h-screen">
    <!-- Fixed 220px Sidebar -->
    @include('components.sidebar')

    <!-- Main Content Area with 220px Left Margin -->
    <div class="flex-1 flex flex-col min-w-0 pl-[220px]">
        <!-- Sticky 72px Top Navbar -->
        @include('components.navbar')

        <!-- Scrollable Main Canvas -->
        <main class="flex-1 p-8 space-y-6 max-w-7xl w-full mx-auto">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="flex items-center gap-3 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 shadow-sm transition-all animate-fade-in">
                    <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-emerald-500/10 flex items-center justify-center text-emerald-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="flex items-center gap-3 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 shadow-sm transition-all animate-fade-in">
                    <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-rose-500/10 flex items-center justify-center text-rose-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

</body>
</html>