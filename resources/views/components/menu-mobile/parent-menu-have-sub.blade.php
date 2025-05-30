<li x-data="{ openSubMenu: null, openSubSubMenu: null }"
    @click="if (!$event.target.closest('a')) { openSubMenu === '{{ $menu }}' ? openSubMenu = null : openSubMenu = '{{ $menu }}' }"
    class="cursor-pointer select-none"
>
    <div class="flex flex-row justify-between items-start w-full">
        <a href="{{ $url }}" class="block text[var(--color-heading)] hover:text-[var(--color-lightblue)]">
            {{ $menu }}
        </a>

        <div class="ml-2 text[var(--color-heading)] hover:text-[var(--color-lightblue)]">
            <svg class="w-4 h-4 transform" 
                :class="{ 'rotate-180': openSubMenu === '{{ $menu }}' }" 
                fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" 
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" 
                    clip-rule="evenodd" />
            </svg>
        </div>
    </div>

    <ul x-show="openSubMenu === '{{ $menu }}'" class="ml-4 mt-2 space-y-2 text-sm text-[var(--color-heading)]" x-cloak>
        {{ $slot }}
    </ul>
</li>
