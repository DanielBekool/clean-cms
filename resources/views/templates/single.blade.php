<x-layouts.app>
    <x-partials.header />
    <main>
        <article>
            <header>
                <h1>{{ $content->title ?? 'Single Post' }}</h1>
                <div class="meta">
                    @if(isset($content->created_at))
                        <time>{{ $content->created_at->format('F j, Y') }}</time>
                    @endif
                </div>
            </header>
            <div class="content">
                {!! $content->content ?? 'Post content goes here.' !!}
            </div>
        </article>
    </main>
    <x-partials.footer />
</x-layouts.app>