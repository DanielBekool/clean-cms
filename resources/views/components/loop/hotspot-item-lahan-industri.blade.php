<div class="item-for-popup absolute transform -translate-y-1/2" style="top: {{ $top }}; left: {{ $left }}" onclick="openModal(this)">
    <span class="absolute inset-0 rounded-full bg-blue-400 opacity-50 animate-ping pointer-events-none"></span>
    <div class="w-3 h-3 gradient-blue rounded-full cursor-pointer z-10"></div>
     
    <div class="flex flex-col gap-5">
            <h6 class="position text-[var(--color-blue)] group-hover:text-white">{{ $h6 ?? 'Posisi' }}</h6>
            <h4 class="name group-hover:text-white"> {{ $h4 ?? 'Nama' }} </h4>
        </div>

        <img class="photo rounded-t-md" src="{{ asset($image) }}">

    <!-- Hidden Description -->
    <div class="description hidden">
        {{ $slot }}
    </div>
</div>


