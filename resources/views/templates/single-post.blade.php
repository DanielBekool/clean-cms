<x-layouts.app>
    <x-partials.header />
    <main>
        <article class="post">
            <header>
                <h1>{{ $content->title ?? 'Blog Post' }}</h1>
                <div class="meta">
                    @if(isset($content->created_at))
                        <time>{{ $content->created_at->format('F j, Y') }}</time>
                    @endif
                    @if(isset($content->author))
                        <span class="author">By {{ $content->author }}</span>
                    @endif
                </div>
            </header>
            <div class="content">
                {!! $content->content ?? 'Post content goes here.' !!}
            </div>
            <footer>
                @if(isset($content->categories) && $content->categories->count() > 0)
                    <div class="categories">
                        <strong>Categories:</strong>
                        @foreach($content->categories as $category)
                            <a href="{{ route('taxonomy.archive', ['lang' => $lang, 'taxonomy_slug' => $category->slug]) }}">
                                {{ $category->name }}
                            </a>
                            @if(!$loop->last), @endif
                        @endforeach
                    </div>
                @endif
                @if(isset($content->tags) && $content->tags->count() > 0)
                    <div class="tags">
                        <strong>Tags:</strong>
                        @foreach($content->tags as $tag)
                            <a href="{{ route('taxonomy.archive', ['lang' => $lang, 'taxonomy_slug' => $tag->slug]) }}">
                                {{ $tag->name }}
                            </a>
                            @if(!$loop->last), @endif
                        @endforeach
                    </div>
                @endif
            </footer>
        </article>
    </main>
    <x-partials.footer />
</x-layouts.app>