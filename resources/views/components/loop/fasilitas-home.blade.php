<!--Item-->
<div class="swiper-slide !flex flex-col h-auto justify-between bg-[var(--color-transit)] overflow-hidden rounded-2xl p-6 pb-0">
    <div class="mb-10 flex flex-col gap-3">
        <h6 class="numbers"></h6>
        <h4>{{ $label ?? 'Fasilitas Kami' }}</h4>
    </div>

    <img class="rounded-2xl rounded-b-none h-[180px] object-cover self-end w-full" src="{{ asset($image) }}">
</div>