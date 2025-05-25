<div class="relative pl-6 pb-8">
    <!--border-->
    <div class="border-milestone absolute left-1.5 top-1 -bottom-1 w-px bg-[var(--color-border)]"></div>
        <!--bullet-->
        <span class="absolute left-0 top-1 w-3 h-3 gradient-blue-background rounded-full"></span>
        <!--content-->
        <div class="flex flex-col gap-3 pb-2">
            <h5 class="lg:text-[1.2em]">{{ $label ?? '' }}</h5>
            <p class="text-[var(--color-purple)]">{{ $date ?? '' }}</p>
        </div>
    <div class="mt-2 border-t border-dashed border-[var(--color-border)] w-full"></div>
</div>