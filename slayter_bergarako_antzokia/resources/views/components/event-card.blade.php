@props(['type', 'typeColor' => 'blue', 'title', 'date', 'image' => null])

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all hover:shadow-md hover:-translate-y-1">
    <div class="h-64 bg-gray-200 flex items-center justify-center text-gray-400 relative">
        @if($image)
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover">
        @else
            <span class="text-sm">[Kartelaren Irudia]</span>
        @endif
    </div>
    <div class="p-6">
        <div class="text-sm font-semibold text-{{ $typeColor }}-600 mb-1 uppercase tracking-wider">{{ $type }}</div>
        <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-1">{{ $title }}</h3>
        <p class="text-gray-500 text-sm mb-5 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            {{ $date }}
        </p>
        <button class="w-full bg-blue-600 text-white py-2.5 px-4 rounded-lg hover:bg-blue-700 transition-colors font-medium">
            Sarrerak erosi
        </button>
    </div>
</div>