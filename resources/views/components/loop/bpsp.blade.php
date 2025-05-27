@props([
    'image' => 'media/content-default.jpg',
    'date' => '',
    'label' => '',
    'url' => '',
    'tag' => '',
])


<a href="{{ $url }}" class="group relative flex flex-col h-auto justify-between bg-[var(--color-transit)] overflow-hidden rounded-md px-6 pt-13 pb-0 block">
    
    <div class="gradient-blue top-0 left-0 w-fit absolute px-3 py-2 rounded-tl-md rounded-br-md {{ $tag === 'tersedia' ? 'blinking' : '' }}">
        <p class="text-white uppercase text-[.8em]">{{ $tag ?? 'segera hadir' }}</p>
    </div>

    <div class="mb-6 flex flex-row justify-between flex-nowrap items-center gap-3 group-hover:text-[var(--color-lightblue)]">
        <h4 class="group-hover:text-[var(--color-lightblue)]">{{ $label ?? 'Bangunan Pabrik Siap Pakai' }}</h4>
        <x-icon.arrow-right-color-current />
    </div>

    <img class="rounded-2xl rounded-b-none h-[180px] object-cover self-end w-full" src="{{ asset($image) }}">
</a>
