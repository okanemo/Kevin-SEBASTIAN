<div class="breadcrumbs__wrapper">
    <div class="breadcrumbs__list-home">
        <i class="fas fa-home"></i>
        <a href="{{ url('/') }}">
            Home
        </a>
    </div>
    <div class="breadcrumbs__spacer">
        <span>
            >
        </span>
    </div>
    <div class="breadcrumbs__category">
        <a href="{{ url('/' . $post->category->name) }}">
            {{ $post->category->name }}
        </a>
    </div>
    <div class="breadcrumbs__spacer">
        <span>
            >
        </span>
    </div>
    <div class="breadcrumbs__title">
        <span>
            {{ $post->title }}
        </span>
    </div>
</div>
