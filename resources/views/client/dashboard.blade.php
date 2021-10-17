@extends('layout.main')

@section('title')
    Pintar Pet
@endsection

@section('content')
    <div class="search-bar__wrapper">
        <div class="container">
            <div class="search-bar__logo">
                <img src="https://ik.imagekit.io/z0he7w4iilk/tr:w-200,h-200/assets/img/pintarpet-mascot-full_DcnIRKTh30.png"
                    alt="Pet Pintar">
            </div>
            <div class="search-bar__main">
                <div class="search-bar__title">
                    <span>
                        Apa yang kamu cari?
                    </span>
                </div>
                <div class="search-bar__button">
                    <form action="{{ url('/search') }}" method="get">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <input name="q" type="text" class="form-control" placeholder="Cari aja disini">
                            <div class="input-group-append">
                                <button class="btn btn-brown">
                                    CARI
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="search-bar__example">
                    <span>
                        Contoh: Kucing Diare, Burung Gacor dan Lainnya
                    </span>
                </div>
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
                @if ($mustRead->isEmpty() && $mustReadBig->isEmpty())
                    <div>
                        Artikel tidak ditemukan.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="category__wrapper">
        <div class="container">
            <div class="section-name">
                <span>
                    Kategori Hewan
                </span>
            </div>

            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($categories as $category)
                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <img src="{{ $category->image('cover', 'default') }}" alt="{{ $category->name }}">
                                    <span class="opacity-background"></span>
                                    <div class="category__name">
                                        <a href="{{ url('/' . $category->name) }}">
                                            {{ $category->name }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content__wrapper">
        <div class="container">
            <div class="newArticle__wrapper">
                <div class="section-name">
                    <span>
                        Artikel Terbaru
                    </span>
                </div>
                <div class="newArticle__content">
                    @foreach ($newArticle as $article)
                        @if ($loop->first)
                            <div class="newArticle__list">
                                <div class="newArticle__image">
                                    <img src="{{ $article->image('cover', 'default') }}" alt="{{ $article->title }}">
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
                                            <div class="newArticle__category {{ strtolower($article->category->name) }}">
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
@endsection

@section('script')
    <script src="{{ asset('js/splide.min.js') }}"></script>
    <script>
        new Splide('.splide', {
            perPage: 4,
            height: '350px',
            cover: true,
            breakpoints: {
                727: {
                    perPage: 2
                },
                424: {
                    perPage: 1
                }
            }
        }).mount()

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
