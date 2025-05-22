<!--Item-->
<div class="group relative flex flex-col h-auto justify-between bg-[var(--color-transit)] overflow-hidden rounded-md px-6 pt-13 pb-0">
    
    <div class="gradient-blue top-0 left-0 w-fit absolute px-3 py-2 rounded-tl-md rounded-br-md">
        <p class="text-white uppercase text-[.8em]">{{ $tag }}</p>
    </div>

    <a class="group-hover:text-[var(--color-lightblue)] mb-6 flex flex-row justify-between flex-nowrap items-center gap-3" href="{{ $url }}">
        <h4 class="group-hover:text-[var(--color-lightblue)]">{{ $label }}</h4>
        <x-icon.arrow-right-color-current/>
    </a>

    <a href="{{ $url }}">
    <img class="rounded-2xl rounded-b-none h-[180px] object-cover self-end w-full" src="{{ asset($image) }}">
    </a>
</div>