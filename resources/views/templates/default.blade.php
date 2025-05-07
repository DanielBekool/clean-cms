<x-layouts.app>
    <x-partials.header />
    <main>
        <h1>{{ $content->title ?? 'Default Title' }}</h1>
        <p>{{ $content ?? 'Default content goes here.' }}</p>
    </main>
    <x-partials.footer />
</x-layouts.app>