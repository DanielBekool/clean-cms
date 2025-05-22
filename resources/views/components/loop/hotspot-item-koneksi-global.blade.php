<div class="absolute transform -translate-y-1/2" style="top: {{ $top }}; left: {{ $left }}">
    <span class="absolute inset-0 rounded-full bg-blue-400 opacity-50 animate-ping pointer-events-none"></span>
    <div class="w-2 h-2 gradient-blue rounded-full cursor-pointer z-10" data-tippy-content="<div class='flex flex-col gap-2'> <h5 class='text-white text-[1em]'>{{ $country }}</h5> <p class='text-white text-[.9em]'>{{ $tooltip ?? '' }}</p> </div>"></div>
</div>
