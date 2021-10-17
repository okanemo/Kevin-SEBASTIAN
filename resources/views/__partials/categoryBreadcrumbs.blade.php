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
    <div class="breadcrumbs__category-text">
        <a href="{{ url('category') }}">
            Kategori
        </a>
    </div>
    <div class="breadcrumbs__spacer">
        <span>
            >
        </span>
    </div>
    <div class="breadcrumbs__category">
        <a href="{{ url($category->name) }}" style="color: #a5a5a5">
            {{ $category->name }}
        </a>
    </div>
</div>
