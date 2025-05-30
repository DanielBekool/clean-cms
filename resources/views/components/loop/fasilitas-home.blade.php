@props([
    'image' => 'media/content-default.jpg',
    'label' => '',
    'slot' => '',
])

<!--Item-->
<div class="fasilitas-home-item same-height group !grow h-full cursor-pointer swiper-slide !flex flex-col justify-between bg-[var(--color-transit)] overflow-hidden rounded-2xl p-6 pb-0" onclick="openModal(this)">
    <div class="mb-10 flex flex-col gap-3">
        <h6 class="numbers"></h6>
        <h4 class="name">{{ $label ?? 'Fasilitas Kami' }}</h4>
    </div>

    <img class="rounded-2xl rounded-b-none h-[180px] object-cover self-end w-full" src="{{ asset($image) }}">

    <!-- Hidden-->
    <div class="description hidden">
        {{ $slot }}
    </div>
    <img class="photo hidden" src="{{ asset($image) }}">
</div>