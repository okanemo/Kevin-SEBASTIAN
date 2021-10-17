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
        <a href="{{ url('/tag/' . $tag->slug) }}">
            Tag
        </a>
    </div>
    <div class="breadcrumbs__spacer">
        <span>
            >
        </span>
    </div>
    <div class="breadcrumbs__category">
        <a href="{{ url('/tag/' . $tag->slug) }}" style="color: #a5a5a5">
            {{ $tag->name }}
        </a>
    </div>
</div>
