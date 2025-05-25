<div class="tender-loop relative flex flex-col justify-between bg-white gap-15 pb-0 pt-12 px-6 rounded-md">
    
    <div class="gradient-blue top-0 left-0 w-fit absolute px-3 py-2 rounded-tl-md rounded-br-md {{ $tag === 'terbaru' ? 'blinking' : '' }}">
        <p class="text-white uppercase text-[.8em]">{{ $tag ?? 'terbaru' }}</p>
    </div>
    <div class="flex flex-col gap-4">
        <a href="{{ $url ?? '#' }}">
            <h4 class="ellipsis">
                {{ $label ?? '' }}
            </h4>
        </a>
        <p class="ellipsis">
            {{ $desc ?? '' }}
        </p>
        <div class="flex flex-row items-center gap-2">
            <x-icon.calendar-icon-color />
            <p class="!text-[var(--color-purple)]">
                {{ $date ?? '' }}
            </p>
        </div>
    </div>

    <div class="flex flex-col gap-5 mt-3">
        <a class="w-full btn3" href="{{ $url ?? '#' }}">
            <span class="gradient-text">Selengkapnya</span>
            <span class="gradient-icon">
                <x-icon.arrow-right-gradient />
            </span>
        </a>
    </div>
</div>
