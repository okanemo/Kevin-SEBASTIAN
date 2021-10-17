@extends('layout.main')

@section('title')
    Kumpulan Kategori Hewan peliharaan Terpopuler di Indonesia | Pet Pintar
@endsection

@section('content')
    <div class="container">
        @include('__partials.pageBreadcrumbs')

        <div class="category__banner">
            <div class="category__banner-image">
                <img src="https://ik.imagekit.io/z0he7w4iilk/tr:w-200,h-200/assets/img/pintarpet-mascot-full_DcnIRKTh30.png"
                    alt="Kategori Hewan Peliharaan Terpopuler">
            </div>
            <div class="category__banner-content">
                <div class="category__banner-title">
                    <span>
                        Kategori Hewan Peliharaan Terpopuler
                    </span>
                </div>
                <div class="category__banner-description">
                    <span>
                        Kumpulan kategori hewan peliharaan terpopuler di Indonesia berdasarkan jenisnya yang dirangkum dari
                        beberapa sumber terpercaya.
                    </span>
                </div>
            </div>
        </div>

        <div class="category-content__wrapper">
            <div class="category-content__section-name">
                <span>
                    Kategori Hewan
                </span>
            </div>
            <div class="category__content">
                @forelse ($categories as $category)
                    <div class="category-content__card">
                        <img src="{{ $category->image('cover', 'default') }}" alt="{{ $category->title }}">
                        <a href="{{ url($category->name) }}" class="opacity-background"></a>
                        <div class="category-content__name">
                            <a href="{{ url($category->name) }}">
                                {{ $category->name }}
                            </a>
                        </div>
                    </div>
                @empty
                    <div>
                        Kategori Tidak Ditemukan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
