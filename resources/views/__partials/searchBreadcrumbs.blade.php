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
        <a href="javscript:void(0)">
            Search
        </a>
    </div>
    <div class="breadcrumbs__spacer">
        <span>
            >
        </span>
    </div>
    <div class="breadcrumbs__category">
        <a href="javascript:void(0)" style="color: #a5a5a5">
            {{ request('q') }}
        </a>
    </div>
</div>
