@extends('layouts.admin')
@section('title', 'Create Event')
@section('page-title', 'Create Event')

@section('content')
<div class="max-w-4xl mx-auto" style="font-family:'Inter',sans-serif;">
    <div class="bg-white rounded-2xl border border-[#C9C2AE]/60 shadow-xl overflow-hidden">
        <!-- Header -->
        <div class="relative p-6 border-b-2 border-dashed border-[#C9C2AE] bg-[#FAF7EF]">
            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#C1443C]" style="font-family:'Space Mono',monospace;">Nouveau billet</span>
            <h2 class="text-base font-bold text-[#1B1B2F] mt-0.5" style="font-family:'Fraunces',serif;">Create New Event</h2>
            <p class="text-xs text-[#1B1B2F]/50 mt-0.5">Fill in the information below to publish a new event.</p>

            <!-- Notch cutouts, ticket-stub language -->
            <div class="absolute -left-3 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-[#FAF7EF] border border-[#C9C2AE]/60 hidden sm:block"></div>
            <div class="absolute -right-3 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-[#FAF7EF] border border-[#C9C2AE]/60 hidden sm:block"></div>
        </div>

        <!-- Form Wrapper -->
        <div class="p-6 sm:p-8">
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="text-[#1B1B2F]">
                @csrf

                @include('admin.events.form')

                <!-- Actions -->
                <div class="mt-8 pt-6 border-t-2 border-dashed border-[#C9C2AE] flex items-center justify-end gap-3">
                    <a href="{{ route('events.index') }}"
                       class="px-5 py-2.5 rounded-full border border-[#C9C2AE] text-[#1B1B2F]/60 hover:bg-[#FAF7EF] font-semibold text-xs transition-all">
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="px-5 py-2.5 rounded-full bg-[#1B1B2F] hover:bg-[#2A2A45] text-white font-semibold text-xs shadow-md transition-all hover:-translate-y-0.5">
                        <span class="text-[#E8A33D]">＋</span> Create Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection