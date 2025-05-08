<x-layouts.app>
    <x-partials.header />
    <main>
        <div class="content-wrapper">
            @if(isset($content) && isset($content->title))
                <h1>{{ $content->title }}</h1>
                <div class="content">
                    {!! $content->content ?? '' !!}
                </div>
            @elseif(isset($posts))
                <h1>{{ $title ?? 'Posts' }}</h1>
                <div class="posts-list">
                    @foreach($posts as $post)
                        <article class="post-item">
                            <h2>
                                <a href="{{ route('single.content', ['lang' => $lang, 'content_type' => $post->getTable(), 'content_slug' => $post->slug]) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            @if(isset($post->excerpt))
                                <div class="excerpt">
                                    {{ $post->excerpt }}
                                </div>
                            @endif
                        </article>
                    @endforeach
                </div>
            @else
                <h1>Welcome</h1>
                <p>No content found.</p>
            @endif
        </div>
    </main>
    <x-partials.footer />
</x-layouts.app>