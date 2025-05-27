 <!-- item counter -->
<div class="counter-item lg:w-1/5 sm:w-1/5 w-1/2 lg:p-5 sm:p-5 lg:mb-0 sm:mb-0 flex flex-col justify-center sm:items-center items-start sm:border-r border-[var(--color-bordertransparent)]">
    <div class="flex flex-row justify-center items-center gap-1">
        <div class="flex flex-col gap-2 w-fit">
            <div class="flex flex-row gap-2">
                <h3 class="counter !font-medium lg:!text-4xl sm:!text-2xl !text-[1.2em] text-white"  data-target="{{ $counter ?? '0' }}">0</h3>
                <h3 class="plus !font-medium lg:!text-[1em] sm:!text-2xl !text-[1.2em] self-end text-white">{{ $unit ?? '' }}</h3>
            </div>
            <div>
                <p class="text-white">{{ $label ?? '' }}</p>
            </div>
        </div>
    </div>
</div>