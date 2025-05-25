@props([
    'image' => 'media/content-default.jpg',
    'top' => '0',
    'left' => '0',
    'label' => '',
    'luas' => '',
    'slot' => '',
])


<div class="item-for-popup absolute transform -translate-y-1/2" style="top: {{ $top ?? '0' }}%; left: {{ $left ?? '0' }}%" onclick="openModal(this)">
    <span class="absolute inset-0 rounded-full bg-blue-400 opacity-50 animate-ping pointer-events-none"></span>
    <div class="w-3 h-3 gradient-blue rounded-full cursor-pointer z-10"></div>
     
    <div class="hidden">
            <h6 class="position">Luas Tanah: {{ $luas }}</h6>
            <h4 class="name"> {{ $label }} </h4>
            <img class="photo" src="{{ asset($image) }}">
        </div>
       

    <!-- Hidden Description -->
    <div class="description hidden">
        {{ $slot }}
    </div>
</div>


