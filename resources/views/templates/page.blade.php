<x-layouts.app>
    <x-partials.header />
    <main>
        <article class="page">
            <header>
                <h1>{{ $content->title ?? 'Page Title' }}</h1>
            </header>
            <div class="page-content">
                {!! $content->content ?? 'Page content goes here.' !!}
            </div>
        </article>
    </main>
    <x-partials.footer />
</x-layouts.app>