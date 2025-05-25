<div class="flex flex-col lg:flex-row lg:justify-between gap-2 border-b border-[var(--color-border)] pb-3 ">
    <p class="font-bold lg:w-[30%]">{{ $label ?? '' }}</p>
    <p class="hidden lg:block w-[1%] px-5">:</p>
    <p class="lg:w-[68%]">{{ $value ?? '' }}</p>
</div>