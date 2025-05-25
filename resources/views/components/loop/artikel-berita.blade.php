@props([
    'image' => 'media/content-default.jpg',
    'tag' => '',
    'date' => '',
    'label' => '',
    'url' => '',
])


<!-- Item -->
<div class="berita-item group transition-all duration-[500ms] relative flex flex-col !min-h-70 rounded-2xl overflow-hidden">

    <!-- Front -->
    <div class="grow gap-2 bg-cover flex flex-col bg-center"
         style="background-image: url('{{ asset($image) }}');">
        <div class="gradient-black-half grow px-6 py-6 h-full flex flex-col justify-end">
            <div class="h-fit flex flex-col gap-2">
                <div class="flex flex-row gap-5">
                    <div class="flex flex-row items-center gap-2">
                        <x-icon.tag-icon-white />
                        <p class="!text-white">{{ $tag ?? '' }}</p>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <x-icon.calendar-icon-white />
                        <p class="!text-white">{{ $date ?? '' }}</p>
                    </div>
                </div>
                <h5 class="!text-white ellipsis">
                    {{ $label ?? '' }}
                </h5>
            </div>
        </div>
    </div>

    <!-- Back -->
    <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full w-full">
        
        <!-- Informasi dan Tanggal -->
        <div class="flex flex-col gap-5">
            <div class="flex flex-row gap-4">
                <div class="flex flex-row items-center gap-2">
                    <x-icon.tag-icon-color />
                    <p class="!text-[var(--color-purple)]">{{ $tag ?? '' }}</p>
                </div>
                <div class="flex flex-row items-center gap-2">
                    <x-icon.calendar-icon-color />
                    <p class="!text-[var(--color-purple)]">{{ $date ?? '' }}</p>
                </div>
            </div>
            <h5 class="ellipsis">
                {{ $label ?? '' }}
            </h5>
        </div>

        <!-- Tombol Selengkapnya -->
        <div class="flex flex-col gap-5">
            <div class="mt-3">
                <a class="w-full btn3" href="{{ $url ?? '' }}">
                    <span class="gradient-text">Selengkapnya</span>
                    <span class="gradient-icon">
                        <x-icon.arrow-right-gradient />
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
