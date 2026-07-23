<div class="grid grid-cols-1 md:grid-cols-2 gap-6" style="font-family:'Inter',sans-serif;">
    <!-- Title Field -->
    <div class="md:col-span-2">
        <label for="title" class="block text-[10px] font-bold text-[#1B1B2F]/60 uppercase tracking-wider mb-2" style="font-family:'Space Mono',monospace;">
            Event Title
        </label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-[#1B1B2F]/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            </span>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $event->title ?? '') }}"
                placeholder="Enter event title"
                class="w-full pl-10 pr-4 py-2.5 bg-[#FAF7EF] border border-[#C9C2AE]/70 rounded-xl text-xs text-[#1B1B2F] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E8A33D]/25 focus:border-[#E8A33D] transition-all placeholder:text-[#1B1B2F]/30">
        </div>
        @error('title')
            <p class="mt-1.5 text-xs font-medium text-[#C1443C] flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Event Image -->
<div class="md:col-span-2">
    <label for="image" class="block text-[10px] font-bold text-[#1B1B2F]/60 uppercase tracking-wider mb-2" style="font-family:'Space Mono',monospace;">
        Event Image
    </label>

    <input
        type="file"
        id="image"
        name="image"
        accept="image/*"
        class="w-full px-4 py-2.5 bg-[#FAF7EF] border border-[#C9C2AE]/70 rounded-xl text-xs text-[#1B1B2F] file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-lg file:bg-[#E8A33D] file:text-white file:font-semibold hover:file:bg-[#d89431] focus:outline-none focus:ring-2 focus:ring-[#E8A33D]/25 focus:border-[#E8A33D] transition-all">

    @error('image')
        <p class="mt-1.5 text-xs font-medium text-[#C1443C] flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
        </p>
    @enderror

    @isset($event)
        @if($event->image_path)
            <div class="mt-4">
                <img src="{{ asset('storage/' . $event->image_path) }}"
                     alt="{{ $event->title }}"
                     class="w-48 h-32 object-cover rounded-xl border border-gray-200">
            </div>
        @endif
    @endisset
</div>

    <!-- Description Field -->
    <div class="md:col-span-2">
        <label for="description" class="block text-[10px] font-bold text-[#1B1B2F]/60 uppercase tracking-wider mb-2" style="font-family:'Space Mono',monospace;">
            Description
        </label>
        <textarea
            id="description"
            name="description"
            rows="5"
            placeholder="Event description..."
            class="w-full p-4 bg-[#FAF7EF] border border-[#C9C2AE]/70 rounded-xl text-xs text-[#1B1B2F] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E8A33D]/25 focus:border-[#E8A33D] transition-all placeholder:text-[#1B1B2F]/30">{{ old('description', $event->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1.5 text-xs font-medium text-[#C1443C] flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Date Field -->
    <div>
        <label for="date" class="block text-[10px] font-bold text-[#1B1B2F]/60 uppercase tracking-wider mb-2" style="font-family:'Space Mono',monospace;">
            Date
        </label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-[#1B1B2F]/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/></svg>
            </span>
            <input
                type="date"
                id="date"
                name="date"
                value="{{ old('date', $event->date ?? '') }}"
                class="w-full pl-10 pr-4 py-2.5 bg-[#FAF7EF] border border-[#C9C2AE]/70 rounded-xl text-xs text-[#1B1B2F] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E8A33D]/25 focus:border-[#E8A33D] transition-all">
        </div>
        @error('date')
            <p class="mt-1.5 text-xs font-medium text-[#C1443C] flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Time Field -->
    <div>
        <label for="time" class="block text-[10px] font-bold text-[#1B1B2F]/60 uppercase tracking-wider mb-2" style="font-family:'Space Mono',monospace;">
            Time
        </label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-[#1B1B2F]/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </span>
            <input
                type="time"
                id="time"
                name="time"
                value="{{ old('time', $event->time ?? '') }}"
                class="w-full pl-10 pr-4 py-2.5 bg-[#FAF7EF] border border-[#C9C2AE]/70 rounded-xl text-xs text-[#1B1B2F] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E8A33D]/25 focus:border-[#E8A33D] transition-all">
        </div>
        @error('time')
            <p class="mt-1.5 text-xs font-medium text-[#C1443C] flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Location Field -->
    <div>
        <label for="location" class="block text-[10px] font-bold text-[#1B1B2F]/60 uppercase tracking-wider mb-2" style="font-family:'Space Mono',monospace;">
            Location
        </label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-[#1B1B2F]/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </span>
            <input
                type="text"
                id="location"
                name="location"
                value="{{ old('location', $event->location ?? '') }}"
                placeholder="Conference Room A"
                class="w-full pl-10 pr-4 py-2.5 bg-[#FAF7EF] border border-[#C9C2AE]/70 rounded-xl text-xs text-[#1B1B2F] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E8A33D]/25 focus:border-[#E8A33D] transition-all placeholder:text-[#1B1B2F]/30">
        </div>
        @error('location')
            <p class="mt-1.5 text-xs font-medium text-[#C1443C] flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Price Field -->
    <div>
        <label for="price" class="block text-[10px] font-bold text-[#1B1B2F]/60 uppercase tracking-wider mb-2" style="font-family:'Space Mono',monospace;">
            Price (DH)
        </label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-[#1B1B2F]/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </span>
            <input
                type="number"
                id="price"
                name="price"
                min="0"
                step="0.01"
                value="{{ old('price', $event->price ?? 0) }}"
                class="w-full pl-10 pr-4 py-2.5 bg-[#FAF7EF] border border-[#C9C2AE]/70 rounded-xl text-xs text-[#1B1B2F] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E8A33D]/25 focus:border-[#E8A33D] transition-all" style="font-family:'Space Mono',monospace;">
        </div>
        @error('price')
            <p class="mt-1.5 text-xs font-medium text-[#C1443C] flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Capacity Field -->
    <div class="md:col-span-2">
        <label for="capacity" class="block text-[10px] font-bold text-[#1B1B2F]/60 uppercase tracking-wider mb-2" style="font-family:'Space Mono',monospace;">
            Maximum Capacity
        </label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-[#1B1B2F]/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </span>
            <input
                type="number"
                id="capacity"
                name="capacity"
                min="1"
                value="{{ old('capacity', $event->capacity ?? '') }}"
                placeholder="100"
                class="w-full pl-10 pr-4 py-2.5 bg-[#FAF7EF] border border-[#C9C2AE]/70 rounded-xl text-xs text-[#1B1B2F] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E8A33D]/25 focus:border-[#E8A33D] transition-all placeholder:text-[#1B1B2F]/30" style="font-family:'Space Mono',monospace;">
        </div>
        @error('capacity')
            <p class="mt-1.5 text-xs font-medium text-[#C1443C] flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $message }}
            </p>
        @enderror
    </div>
</div>