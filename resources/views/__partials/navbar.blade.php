<div class="top-bar__wrapper">
    <div class="container">
        <div class="top-bar__date">
            <span class="top-bar__today">
                Hari ini:
            </span>
            {{ Carbon\Carbon::now()->format('l, d F Y') }}
        </div>
    </div>
</div>
<div class="navbar__wrapper">
    <div class="container">
        <div class="navbar">
            <div class="navbar__logo">
                <a href="{{ url('/') }}">
                    <img src="https://petpintar.com/assets/img/pintarpet-mascot-left-text.png" alt="Pet Pintar">
                </a>
            </div>
            <div class="navbar__menu">
                <div class="small__menu">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="menu__list">
                    <a href="{{ url('/posts/popular') }}">
                        <span>
                            Banyak Dibaca
                        </span>
                        <sub>
                            Populer
                        </sub>
                    </a>
                </div>
                <div class="menu__list dropdown">
                    <span>
                        Hewan Peliharaan
                    </span>
                    <div class="dropdown__menu">
                        @foreach ($categories as $category)
                            <div class="dropdown__menu-list">
                                <a href="{{ url($category->name) }}">
                                    {{ $category->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="menu__list dropdown">
                    <span>
                        Topik Populer
                    </span>
                    <div class="dropdown__menu">
                        @foreach ($tags as $tag)
                            <div class="dropdown__menu-list">
                                <a href="{{ url('/tag/' . $tag->slug) }}">
                                    {{ $tag->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
