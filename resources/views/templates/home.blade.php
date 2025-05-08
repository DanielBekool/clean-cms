<x-layouts.app>
    <x-partials.header />
    <main>
        <h1>{{ $content->title ?? 'Home Page' }}</h1>
        <div class="content">
            {!! $content->content ?? 'Welcome to the home page.' !!}
        </div>
    </main>
    <x-partials.footer />
</x-layouts.app>