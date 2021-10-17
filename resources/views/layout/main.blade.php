<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themes/splide-skyblue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
</head>

<body>
    @include('__partials.navbar')

    @yield('content')

    <div class="full-opacity-background"></div>
    <div class="small__menu-wrapper">
        <i class="fas fa-times close-small__menu"></i>
        <div class="small__menu-content">
            <div class="small__menu-list">
                <a href="{{ url('/') }}">
                    <span>
                        Home
                    </span>
                </a>
            </div>
            <div class="small__menu-list">
                <a href="{{ url('/posts/popular') }}">
                    <span>
                        Banyak Dibaca
                    </span>
                    <sub>
                        Populer
                    </sub>
                </a>
            </div>
            <div class="small__menu-list small__menu-dropdown">
                <a href="javascript:void(0)">
                    <span>
                        Hewan Peliharaan
                    </span>
                    <i class="fas fa-sort-down"></i>
                </a>
                <div class="small__menu-dropdown-content">
                    <div class="small__menu-dropdown-list">
                        @foreach ($categories as $category)
                            <a href="{{ url($category->name) }}">
                                <span>
                                    {{ $category->name }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="small__menu-list small__menu-dropdown">
                <a href="javascript:void(0)">
                    <span>
                        Topik Populer
                    </span>
                    <i class="fas fa-sort-down"></i>
                </a>
                <div class="small__menu-dropdown-content">
                    <div class="small__menu-dropdown-list">
                        @foreach ($tags as $tag)
                            <a href="{{ url('/tag/' . $tag->name) }}">
                                <span>
                                    {{ $tag->name }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('__partials.footer')

    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/b98b857042.js" crossorigin="anonymous"></script>
    <script>
        $('.small__menu').click(function() {
            $('body').css('overflow-y', 'hidden')
            $('.full-opacity-background').css('visibility', 'visible')
            $('.small__menu-wrapper').css('right', 0)
        })

        $('.close-small__menu').click(function() {
            $('body').css('overflow-y', 'unset')
            $('.full-opacity-background').css('visibility', 'hidden')
            $('.small__menu-wrapper').css('right', '-150%')
        })

        $('.small__menu-list.small__menu-dropdown').click(function() {
            $(this).find('i').toggleClass('fa-sort-down').toggleClass('fa-sort-up')

            $(this).find('i').hasClass('fa-sort-up') ? $(this).find('.small__menu-dropdown-content').css('display',
                'none') : $(this).find('.small__menu-dropdown-content').css('display', 'block')
        })

        $('.small__menu-list.small__menu-dropdown .small__menu-dropdown-content a').click(function(e) {
            e.stopPropagation()
        })
    </script>
    @yield('script')
</body>

</html>
