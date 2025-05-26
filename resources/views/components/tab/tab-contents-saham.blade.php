@props(['id', 'activeTab' => 'tab'])

<div x-show="{{ $activeTab }} === '{{ $id }}'" x-cloak class="bg-[var(--color-transit)] p-4 sm:p-6 pt-9 lg:p-16 sm:pt-13 rounded-b-md sm:rounded-tr-md lg:rounded-2xl lg:-mt-4 z-99 relative">
    {{ $slot }}
</div>
