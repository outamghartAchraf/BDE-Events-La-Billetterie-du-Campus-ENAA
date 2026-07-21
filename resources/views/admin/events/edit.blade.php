@extends('layouts.admin')
@section('title', 'Edit Event')
@section('page-title', 'Edit Event')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-xl overflow-hidden">
        <!-- Header -->
        <div class="p-6 border-b border-gray-100 bg-gray-50/50">
            <h2 class="text-base font-bold text-gray-900">Edit Event Parameters</h2>
            <p class="text-xs text-gray-400 mt-0.5">Update details and settings for this campus activity.</p>
        </div>

        <!-- Form Wrapper -->
        <div class="p-6 sm:p-8">
            <form action="{{ route('events.update', $event) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.events.form')

                <!-- Actions -->
                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a href="{{ route('events.index') }}"
                       class="px-5 py-2.5 rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50 font-semibold text-xs transition-all">
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-xs shadow-md hover:shadow-indigo-500/20 transition-all hover:-translate-y-0.5">
                        Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection