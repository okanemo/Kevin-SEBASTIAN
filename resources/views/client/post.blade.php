@extends('layout.main')

@section('title')
    {{ $post->title }} | Pintar Pet
@endsection

@section('content')
    <div class="container">
        @include('__partials.postBreadcrumbs')

        <div class="content__wrapper">
            <div class="post-content__wrapper">
                <div class="post__category {{ strtolower($post->category->name) }}">
                    <a href="{{ url('/tag/' . strtolower($post->tags->first()->slug)) }}" class="text-uppercase">
                        {{ $post->tags->first()->name }}
                    </a>
                </div>
                <div class="post__date">
                    <span>
                        {{ $post->created_at->format('l, d F Y') }}
                    </span>
                </div>
                <div class="post__title">
                    <span>
                        {{ $post->title }}
                    </span>
                </div>
                <div class="post__author">
                    <span>
                        Penulis:
                        <a href="{{ url('/' . $post->author->name) }}">
                            {{ $post->author->name }}
                        </a>
                    </span>
                </div>

                <div class="post__banner">
                    <img src="{{ $post->image('cover', 'default') }}" alt="{{ $post->title }}">
                </div>
                <div class="post__headline">
                    <span>
                        {{ $post->headline }}
                    </span>
                </div>
                <div class="post__description">
                    <span>
                        {!! $post->description !!}
                    </span>
                </div>
                <div class="post-tags__wrapper">
                    @foreach ($post->tags as $tag)
                        <div class="post-tags__list">
                            <a href="{{ url('/tag/' . $tag->slug) }}" class="text-uppercase">
                                # {{ $tag->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="post__pagination">
                    <div class="post__pagination-previous">
                        @if ($previousArticle)
                            <a href="{{ url('/posts/' . $previousArticle->slug) }}">
                                <span>
                                    {{ $previousArticle->title }}
                                </span>
                                <div class="previousText">
                                    <span>
                                        Sebelumnya
                                    </span>
                                </div>
                            </a>
                        @endif
                    </div>

                    <div class="post__pagination-next">
                        @if ($nextArticle)
                            <a href="{{ url('/posts/' . $nextArticle->slug) }}">
                                <span>
                                    {{ $nextArticle->title }}
                                </span>
                                <div class="nextText">
                                    <span>
                                        Selanjutnya
                                    </span>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="relatedArticle__wrapper">
                    <div class="relatedArticle__section-name">
                        <span>
                            Artikel Terkait
                        </span>
                    </div>
                    <div class="relatedArticle__main">
                        @forelse ($relatedArticle as $article)
                            <div class="relatedArticle__list">
                                <div class="relatedArticle__image">
                                    <img src="{{ $article->image('cover', 'default') }}" alt="{{ $article->title }}">
                                    <a href="{{ url('/' . strtolower($article->category->name)) }}"
                                        class="relatedArticle__category {{ strtolower($article->category->name) }}">
                                        <span class="text-uppercase">
                                            {{ $article->category->name }}
                                        </span>
                                    </a>
                                </div>
                                <div class="relatedArticle__title">
                                    <a href="{{ url('/posts/' . $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </div>
                                <div class="relatedArticle__small-details">
                                    <span>
                                        {{ $article->author->name }}
                                    </span>
                                    <span>
                                        {{ $article->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div>
                                Artikel tidak ditemukan.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            @include('__partials.popularArticle')
        </div>
    </div>
@endsection
