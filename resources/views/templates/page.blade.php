<x-layouts.app :title="$title ?? ($content->title ?? 'Page')">
    <x-partials.header />
    <main>
        @if ($content)
            <article class="page">
                <header>
                    <h1>{{ $content->title ?? 'Untitled Page' }}</h1>
                </header>
                <div class="page-content">
                    {!! $content->content ?? '' !!}
                </div>
            </article>
        @else
            <p>Page content not found.</p>
        @endif
    </main>
    <x-partials.footer />
</x-layouts.app>