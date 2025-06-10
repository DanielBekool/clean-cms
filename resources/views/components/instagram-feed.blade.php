@php
    // Maksimum kolom desktop
    $maxColumns = 6;
    $cols = min(max($columns, 1), $maxColumns);

    // Atur jumlah kolom mobile berdasarkan tipe konten
    $mobileCols = match($type) {
        'video' => 1,
        default => 2, // image, carousel, dll.
    };

    // Komposisi kelas grid tailwind
    $gridClass = 'grid-cols-' . $mobileCols . ' md:grid-cols-' . $cols;

    // Format timestamp
    $formatTimestamp = function($timestamp) {
        return \Carbon\Carbon::parse($timestamp)->diffForHumans();
    };
@endphp

<div class="instagram-feed">
    <div class="grid {{ $gridClass }} gap-4">
        @forelse($feeds as $feed)
            <div class="rounded shadow p-2 bg-white flex flex-col h-full">
                <a href="{{ $feed['permalink'] }}" target="_blank" rel="noopener noreferrer" class="block flex-grow">
                    @if (in_array($feed['media_type'], ['IMAGE', 'CAROUSEL_ALBUM']))
                        <img src="{{ $feed['media_url'] }}"
                             alt="{{ $feed['caption'] ?? 'Instagram Image' }}"
                             class="w-full h-48 lg:h-60 object-cover rounded-t"
                             loading="lazy" />
                    @elseif($feed['media_type'] === 'VIDEO')
                        <div class="relative">
                            <img src="{{ $feed['thumbnail_url'] ?? $feed['media_url'] }}"
                                 alt="{{ $feed['caption'] ?? 'Instagram Video' }}"
                                 class="w-full h-48 lg:h-60 object-cover rounded-t"
                                 loading="lazy" />
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-12 h-12 text-white opacity-75" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11v11.78a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                </svg>
                            </div>
                        </div>
                    @endif
                </a>
                
                @if($showCaption || $showLikes || $showTimestamp)
                    <div class="p-3 pt-2 mt-auto">
                        @if($showCaption && !empty($feed['caption']))
                            <p class="text-sm text-gray-700 mb-2 line-clamp-2">
                                {{ $feed['caption'] }}
                            </p>
                        @endif
                        
                        <div class="flex items-center justify-between text-xs text-gray-500 mt-2">
                            @if($showLikes && isset($feed['like_count']))
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a1 1 0 00-.8.4z"></path>
                                    </svg>
                                    {{ number_format($feed['like_count']) }}
                                </span>
                            @endif
                            
                            @if($showTimestamp && !empty($feed['timestamp']))
                                <span class="text-xs text-gray-400">
                                    {{ $formatTimestamp($feed['timestamp']) }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500 py-8">No Instagram posts found.</p>
        @endforelse
    </div>
</div>

@push('styles')
<style>
    .instagram-feed img {
        transition: transform 0.3s ease;
    }
    .instagram-feed a:hover img {
        transform: scale(1.02);
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush
