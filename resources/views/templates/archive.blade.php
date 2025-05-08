<x-layouts.app>
    <x-partials.header />
    <main>
        <header class="archive-header">
            <h1>{{ $title ?? 'Archive' }}</h1>
            @if(isset($description))
                <div class="archive-description">
                    {!! $description !!}
                </div>
            @endif
        </header>

        <div class="archive-content">
            @if(isset($posts) && $posts->count() > 0)
                <div class="posts-grid">
                    @foreach($posts as $post)
                        <article class="post-card">
                            @if(isset($post->featured_image))
                                <div class="post-thumbnail">
                                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                                </div>
                            @endif
                            <div class="post-content">
                                <h2>
                                    <a href="{{ route('single.content', ['lang' => $lang, 'content_type' => $post->getTable(), 'content_slug' => $post->slug]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                @if(isset($post->excerpt))
                                    <div class="post-excerpt">
                                        {{ $post->excerpt }}
                                    </div>
                                @endif
                                <div class="post-meta">
                                    @if(isset($post->created_at))
                                        <time>{{ $post->created_at->format('F j, Y') }}</time>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if(method_exists($posts, 'links'))
                    <div class="pagination">
                        {{ $posts->links() }}
                    </div>
                @endif
            @else
                <div class="no-posts">
                    <p>No posts found.</p>
                </div>
            @endif
        </div>
    </main>
    <x-partials.footer />
</x-layouts.app>