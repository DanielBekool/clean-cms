<x-layouts.app :title="$title ?? 'Default Page'">
    <x-partials.header />
    <main>
        <h1>{{ $title ?? 'Default Page' }}</h1>
        
        {{-- Content goes here --}}

    </main>
    <x-partials.footer />
</x-layouts.app>