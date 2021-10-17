@extends('layout.main')

@section('title')
    Hasil Pencarian {{ request('q') }} | Pintar Pet
@endsection

@section('content')
    <div class="container">
        @include('__partials.searchBreadcrumbs')

        <div class="search-bar__wrapper">
            <div class="container">
                <div class="search-bar__logo">
                    <img src="https://ik.imagekit.io/z0he7w4iilk/tr:w-200,h-200/assets/img/pintarpet-mascot-full_DcnIRKTh30.png"
                        alt="Pet Pintar">
                </div>
                <div class="search-bar__main">
                    <div class="search-bar__title">
                        <span>
                            Hasil Pencarian:
                        </span>
                        <div class="search-bar__query">
                            <span>
                                {{ request('q') }}
                            </span>
                        </div>
                    </div>
                    <div class="search-bar__button">
                        <form action="{{ url('/search') }}" method="get">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input name="q" type="text" class="form-control" placeholder="Cari aja disini"
                                    value="{{ request('q') }}">
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
    </div>

    <div class="content__wrapper">
        <div class="container">
            <div class="newArticle__wrapper">
                <div class="section-name">
                    <span>
                        Artikel Terkait
                    </span>
                </div>
                <div class="newArticle__content">
                    @foreach ($post as $article)
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
                            @foreach ($post as $article)
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
                        {{ $post->appends(Request::all())->links() }}
                    </div>
                    @if ($post->isEmpty())
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
