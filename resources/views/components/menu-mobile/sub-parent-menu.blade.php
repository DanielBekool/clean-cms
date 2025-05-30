<li
    @click.stop="openSubSubMenu === '{{ $menu }}' ? openSubSubMenu = null : openSubSubMenu = '{{ $menu }}'"
    class="cursor-pointer"
>
    <div class="flex justify-between items-center">
        <a href="{{ $url }}" class="block hover:text-[var(--color-lightblue)]">{{ $menu }}</a>
        <svg class="w-3 h-3 ml-2 transform" 
            :class="{ 'rotate-180': openSubSubMenu === '{{ $menu }}' }" 
            fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" 
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" 
                clip-rule="evenodd" />
        </svg>
    </div>

    <ul x-show="openSubSubMenu === '{{ $menu }}'" class="ml-4 mt-2 space-y-2 text-sm text-[var(--color-heading)]" x-cloak>
        {{ $slot }}
    </ul>
</li>
