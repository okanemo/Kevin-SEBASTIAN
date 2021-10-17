@extends('layout.main')

@section('title')
    Kumpulan Tips dan Informasi Seputar Hewan Peliharaan | Pet Pintar
@endsection

@section('content')
    <div class="container" style="position: relative; z-index: 1">
        @include('__partials.articleBreadcrumbs')

        <div class="category__banner">
            <div class="category__banner-image">
                <img src="https://ik.imagekit.io/z0he7w4iilk/tr:w-200,h-200/assets/img/pintarpet-mascot-full_DcnIRKTh30.png"
                    alt="Artikel Hewan Peliharaan Terbaru">
            </div>
            <div class="category__banner-content">
                <div class="category__banner-title">
                    <span>
                        Artikel Hewan Peliharaan Terbaru
                    </span>
                </div>
                <div class="category__banner-description">
                    <span>
                        Sumber infomasi populer seputar kesehatan Hewan Peliharaan anda serta tips untuk merawatnya yang
                        dirangkum dari beberapa sumber terpercaya.
                    </span>
                </div>
            </div>
        </div>

        <div class="content__wrapper d-block" style="padding: 5rem 0 8rem">
            <div class="container">
                <div class="newArticle__wrapper">
                    <div class="section-name">
                        <span>
                            Masih Hangat
                        </span>
                    </div>
                    <div class="newArticle__content">
                        @foreach ($newArticle as $article)
                            @if ($loop->first)
                                <div class="newArticle__list">
                                    <div class="newArticle__image">
                                        <img src="{{ $article->image('cover', 'default') }}"
                                            alt="{{ $article->title }}">
                                    </div>
                                    <div class="newArticle__content">
                                        <div class="newArticle__small-details">
                                            <div class="newArticle__category {{ strtolower($article->category->name) }}">
                                                <a href="{{ url($article->category->name) }}"
                                                    class="text-uppercase text-decoration-none text-white">
                                                    {{ $article->category->name }}
                                                </a>
                                            </div>
                                            <div class="newArticle__date">
                                                <i class="far fa-clock"></i>
                                                <span>
                                                    {{ $article->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="newArticle__title">
                                            <a href="{{ url('/posts/' . $article->slug) }}">
                                                {{ $article->title }}
                                            </a>
                                        </div>
                                        <div class="newArticle__description">
                                            <span>
                                                {{ $article->headline }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <div class="scroll-pagination">
                            <div class="newArticle__grid">
                                @foreach ($newArticle as $article)
                                    @if (!$loop->first)
                                        <div class="newArticle__list">
                                            <div class="newArticle__image">
                                                <img src="{{ $article->image('cover', 'default') }}"
                                                    alt="{{ $article->title }}">
                                                <div
                                                    class="newArticle__category {{ strtolower($article->category->name) }}">
                                                    <a href="{{ url($article->category->name) }}"
                                                        class="text-uppercase text-decoration-none text-white">
                                                        {{ $article->category->name }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="newArticle__title">
                                                <a href="{{ url('/posts/' . $article->slug) }}">
                                                    {{ $article->title }}
                                                </a>
                                            </div>
                                            <div class="newArticle__small-details">
                                                <div class="must-read__author">
                                                    <span>
                                                        {{ $article->author->name }}
                                                    </span>
                                                </div>
                                                <div class="must-read__date">
                                                    <i class="far fa-clock"></i>
                                                    <span>
                                                        {{ $article->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            {{ $newArticle->links() }}
                        </div>
                        @if ($newArticle->isEmpty())
                            <div>
                                Artikel tidak ditemukan.
                            </div>
                        @endif
                    </div>
                </div>

                @include('__partials.popularArticle')

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.scroll-pagination').jscroll({
            autoTrigger: true,
            padding: 0,
            nextSelector: 'a[rel="next"]',
            contentSelector: '.newArticle__wrapper > .newArticle__content',
            callback: function() {
                $('nav[role="navigation"]').remove()
            }
        })
    </script>
@endsection
