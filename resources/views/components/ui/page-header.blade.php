<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 animate-fade-up">
    <div>
        <h1 class="text-4xl font-bold text-gray-800">{{ $title }}</h1>
        @if(isset($subtitle) && $subtitle)
            <p class="text-gray-500 mt-2">{{ $subtitle }}</p>
        @endif
    </div>
    
    @if(isset($slot) && $slot->isNotEmpty())
        <div>
            {{ $slot }}
        </div>
    @endif
</div>
