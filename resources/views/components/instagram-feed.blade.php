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
@endphp

<div class="grid {{ $gridClass }} gap-4">
    @forelse($feeds as $feed)
        <div class="rounded shadow p-2 bg-white">
            <a href="{{ $feed['permalink'] }}" target="_blank" rel="noopener noreferrer">
                @if (in_array($feed['media_type'], ['IMAGE', 'CAROUSEL_ALBUM']))
                    <img src="{{ $feed['media_url'] }}"
                         alt="Instagram Image"
                         class="w-full lg:h-80 object-cover rounded"
                         loading="lazy" />
                @elseif($feed['media_type'] === 'VIDEO')
                    <img src="{{ $feed['thumbnail_url'] ?? $feed['media_url'] }}"
                         alt="Instagram Video Thumbnail"
                         class="w-full lg:h-120 object-cover rounded"
                         loading="lazy" />
                @endif
            </a>
        </div>
    @empty
        <p class="col-span-full text-center">No feeds found for this filter.</p>
    @endforelse
</div>
