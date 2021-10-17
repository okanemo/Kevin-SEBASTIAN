@extends('layout.main')

@section('title')
    Informasi Tips dan Kesehatan Seputar {{ $category->name }} | Pintar Pet
@endsection

@section('content')
    <div class="container">
        @include('__partials.categoryBreadcrumbs')

        <div class="category__banner">
            <div class="category__banner-image">
                <img src="https://ik.imagekit.io/z0he7w4iilk/tr:w-200,h-200/assets/img/pintarpet-mascot-full_DcnIRKTh30.png"
                    alt="Artikel {{ $category->name }} Terbaru">
            </div>
            <div class="category__banner-content">
                <div class="category__banner-title">
                    <span>
                        Artikel {{ $category->name }} Terbaru
                    </span>
                </div>
                <div class="category__banner-description">
                    <span>
                        Sumber infomasi terbaru seputar kesehatan {{ $category->name }} anda serta tips untuk merawatnya
                        yang dirangkum
                        dari
                        beberapa sumber terpercaya.
                    </span>
                </div>
            </div>
        </div>

        <div class="must-read__wrapper">
            <div class="container">
                <div class="section-name">
                    <span>
                        Wajib Baca
                    </span>
                </div>
                <div class="must-read__content">
                    <div class="must-read__big">
                        @foreach ($mustReadBig as $item)
                            <div class="must-read__card">
                                <img src="{{ $item->image('cover', 'default') }}" alt="{{ $item->title }}">
                                <a class="opacity-background" href="{{ url('/posts/' . $item->slug) }}"></a>
                                <div class="must-read__description">
                                    <div class="must-read__category {{ strtolower($item->category->name) }}">
                                        <a href="{{ url($item->category->name) }}"
                                            class="text-uppercase text-white text-decoration-none">
                                            {{ $item->category->name }}
                                        </a>
                                    </div>
                                    <div class="must-read__title">
                                        <span>
                                            {{ $item->title }}
                                        </span>
                                    </div>
                                    <div class="must-read__small-details">
                                        <div class="must-read__author">
                                            <span>
                                                {{ $item->author->name }}
                                            </span>
                                        </div>
                                        <div class="must-read__date">
                                            <i class="far fa-clock"></i>
                                            <span>
                                                {{ $item->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="must-read__small">
                        @foreach ($mustRead as $item)
                            <div class="must-read__small-list">
                                <div class="must-read__small-logo">
                                    <img src="{{ $item->image('cover', 'default') }}" alt="{{ $item->title }}">
                                </div>
                                <div class="must-read__small-content">
                                    <div class="must-read__small-category {{ strtolower($item->category->name) }}">
                                        <a href="{{ url($item->category->name) }}"
                                            class="text-uppercase text-decoration-none text-white">
                                            {{ $item->category->name }}
                                        </a>
                                    </div>
                                    <div class="must-read__small-description">
                                        <a href="{{ url('/posts/' . $item->slug) }}">
                                            {{ $item->title }}
                                        </a>
                                    </div>
                                    <div class="must-read__small-date">
                                        <i class="far fa-clock"></i>
                                        <span>
                                            {{ $item->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($mustRead->isEmpty() && $mustReadBig->isEmpty())
                    <div>
                        Artikel tidak ditemukan.
                    </div>
                @endif
            </div>
        </div>

        <div class="content__wrapper d-block">
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
