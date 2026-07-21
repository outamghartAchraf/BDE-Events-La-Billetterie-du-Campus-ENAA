@extends('layouts.student')
@section('title', 'Edit Profile')
@section('page-title', 'Edit Profile')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-base font-bold text-gray-900">Update Profile Details</h2>
            <p class="text-xs text-gray-400 mt-0.5">Keep your account details up to date</p>
        </div>
        <a href="{{ route('student.profile.index') }}" class="text-xs font-semibold text-gray-500 hover:text-gray-800 transition-colors">Cancel</a>
    </div>

    <div class="bg-white rounded-3xl border border-gray-200/80 shadow-xs p-8">
        <form method="POST" action="{{ route('student.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="space-y-1.5">
                <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                @error('name')
                    <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="space-y-1.5">
                <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                @error('email')
                    <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div class="space-y-1.5">
                <label for="phone" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Phone Number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all" placeholder="+212 600-000000">
                @error('phone')
                    <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password section -->
            <div class="pt-6 border-t border-gray-100 space-y-4">
                <h3 class="text-xs font-bold text-gray-900 uppercase tracking-wider">Change Password (Optional)</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">New Password</label>
                        <input type="password" name="password" id="password" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                        @error('password')
                            <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label for="password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('student.profile.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-5 py-2.5 rounded-xl text-xs font-bold bg-indigo-600 hover:bg-indigo-700 text-white transition-all shadow-md">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection