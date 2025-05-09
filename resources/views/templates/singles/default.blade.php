<x-layouts.app :title="$title ?? 'Single Default'">
    <x-partials.header />
    <main>
        @if ($content)
            <article class="single default">
                <header>
                    <h1>{{ $content->title ?? 'Untitled Single Content' }}</h1>
                </header>
                <div class="content">
                    {!! $content->content ?? '' !!}
                </div>
            </article>
        @else
            <p>Content not found.</p>
        @endif
    </main>
    <x-partials.footer />
</x-layouts.app>