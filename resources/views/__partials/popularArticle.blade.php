<div class="popularArticle__wrapper">
    <div class="popularArticle__section-name">
        <span>
            Artikel Populer
        </span>
    </div>
    <div class="popularArticle__main">
        @forelse ($popularArticle as $article)
            <div class="popularArticle__list">
                <div class="popularArticle__content">
                    <div class="popularArticle__category {{ strtolower($article->category->name) }}">
                        <a href="{{ url($article->category->name) }}"
                            class="text-uppercase text-decoration-none text-white">
                            {{ $article->category->name }}
                        </a>
                    </div>
                    <div class="popularArticle__title">
                        <a href="{{ url('/posts/' . $article->slug) }}">
                            {{ $article->title }}
                        </a>
                    </div>
                    <div class="popularArticle__date">
                        <i class="far fa-clock"></i>
                        <span>
                            {{ $article->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                <div class="popularArticle__image">
                    <img src="{{ $article->image('cover', 'default') }}" alt="{{ $article->title }}">
                </div>
            </div>
        @empty
            <div>
                Artikel tidak ditemukan.
            </div>
        @endforelse
    </div>
</div>
