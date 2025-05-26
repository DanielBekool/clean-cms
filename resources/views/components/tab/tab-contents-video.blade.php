@props(['id', 'activeTab' => 'tab'])

<div x-show="{{ $activeTab }} === '{{ $id }}'" x-cloak class="mt-10 z-99 relative">
    {{ $slot }}
</div>
