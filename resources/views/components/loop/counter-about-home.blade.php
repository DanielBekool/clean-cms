 <!--counter-->
<div class="sm:p-8 p-4 flex flex-col justify-between items-start bg-white rounded-2xl">
    <div class="flex flex-row justify-start gap-1 mb-2">
        <h3 class="counter gradient-text !font-medium lg:!text-4xl sm:!text-2xl" data-target="{{ $counter ?? '0' }}">0</h3>
        <h3 class="plus gradient-text !font-medium lg:!text-4xl sm:!text-2xl">+</h3>
    </div>
    <div>
        <p class="!text-[var(--color-heading)]">{{ $label ?? '' }}</p>
    </div>
</div>