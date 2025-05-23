<x-layouts.app :title="$title ?? 'Single Content'">
    <x-partials.header />
    <main>
        @if ($content)
            <article>
                <header>
                    <h1>{{ $content->title ?? 'Untitled' }}</h1>
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