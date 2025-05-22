<!--item-->
<div class="group item-for-popup flex flex-col justify-between gap-9 cursor-pointer bg-[var(--color-transit)] hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)] rounded-md px-4 pt-6 sm:pt-6 sm:px-6 transition"
    onclick="openModal(this)">
    <div class="flex flex-col gap-5">
        <h6 class="position text-[var(--color-blue)] group-hover:text-white">{{ $position ?? '' }}</h6>
        <h4 class="name group-hover:text-white"> {{ $name ?? '' }} </h4>
    </div>

    <img class="photo rounded-t-md" src="{{ asset($image) }}">

    <!-- Hidden Description -->
    <div class="description hidden">
        {{ $slot }}
    </div>
</div>