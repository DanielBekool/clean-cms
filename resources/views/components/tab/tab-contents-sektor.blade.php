@props([
    'id', 
    'activeTab' => 'tab', 
    'label' => '', 
    'desc' => '', 
    'image' => ''
])

<div x-show="{{ $activeTab }} === '{{ $id }}'" x-cloak class="bg-[var(--color-transit)] p-4 sm:p-6 pt-9 lg:p-16 sm:pt-13 rounded-b-md sm:rounded-tr-md lg:rounded-2xl lg:-mt-4 z-99 relative">
   <div class="flex flex-col lg:flex-row lg:justify-between gap-12">
        <div class="flex flex-col justify-between gap-10 lg:gap-20 lg:w-1/2">
            <div class="flex flex-col gap-5">
                <h2 data-aos="fade-up">{{ $label ?? '' }}</h2>
                <div class="text-[var(--color-text)] dm-sans">{!! $desc ?? '' !!}</div>
            </div>
        </div>
        <div class="relative lg:w-1/2">
            <a href="{{ asset($image) }}" data-lightbox="gallery">
                <img class="w-full object-contain" src="{{ asset($image) }}">
            </a>
        </div>
    </div>
</div>
