@props(['title', 'tab', 'activeTab' => 'tab'])

<button 
    @click="{{ $activeTab }} = '{{ $tab }}'" 
    :class="{{ $activeTab }} === '{{ $tab }}' 
        ? ' text-white gradient-blue border-none' 
        : 'text-[var(--color-heading)]'"
    class="py-2 px-5 border border-[var(--color-heading)] hover:bg-[--color-blue] hover:text-white hover:border-none focus:outline-none cursor-pointer rounded-full uppercase font-bold manrope z-1">
    {{ $title }}

</button>