<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | BDE Events</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-900 via-slate-900 to-black flex items-center justify-center px-4">

    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-32 -left-20 w-96 h-96 bg-purple-600/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-600/30 rounded-full blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-md">

        <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl shadow-2xl p-8">

            <div class="text-center mb-8">

                <div class="w-20 h-20 rounded-full bg-indigo-600 flex items-center justify-center mx-auto shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-10 h-10 text-white"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>

                <h1 class="text-3xl font-bold text-white mt-5">
                    Create Account
                </h1>

                <p class="text-gray-300 mt-2">
                    Join BDE Events today
                </p>

            </div>

            @if ($errors->any())
                <div class="mb-6 rounded-xl bg-red-500/20 border border-red-400 p-4">
                    <ul class="text-red-200 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="text-sm text-gray-300">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="John Doe"
                        class="mt-2 w-full rounded-xl border border-white/20 bg-white/10 text-white placeholder-gray-400 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="text-sm text-gray-300">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="example@email.com"
                        class="mt-2 w-full rounded-xl border border-white/20 bg-white/10 text-white placeholder-gray-400 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="text-sm text-gray-300">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="********"
                        class="mt-2 w-full rounded-xl border border-white/20 bg-white/10 text-white placeholder-gray-400 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="text-sm text-gray-300">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="********"
                        class="mt-2 w-full rounded-xl border border-white/20 bg-white/10 text-white placeholder-gray-400 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <button
                    class="w-full py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 transition duration-300 text-white font-semibold shadow-lg hover:shadow-indigo-500/50">

                    Create Account

                </button>

            </form>

            <div class="mt-8 text-center">

                <span class="text-gray-300">
                    Already have an account?
                </span>

                <a href="{{ route('login') }}"
                   class="text-indigo-400 hover:text-indigo-300 font-semibold ml-1">

                    Login

                </a>

            </div>

        </div>

    </div>

</body>
</html>