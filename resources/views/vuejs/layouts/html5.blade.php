<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title', config('app.name')) | 籤到 | ChianIn</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('description', '提供線上求籤、籤詩解說、神明介紹與全台廟宇資訊')">
        <meta name="keywords" content="@yield('keywords', '籤詩,抽籤,求籤,廟宇,神明')">
        <meta property="og:title" content="@yield('title', config('app.name'))">
        <meta property="og:description" content="@yield('description')">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="@yield('image', asset('images/default-og.jpg'))">
        <meta name="author" content="@yield('author', 'will')">
@yield('meta')
        @include('vuejs.layouts.style')
        @include('vuejs.layouts.scripts_head')
    </head>
    <body>
        <div id="app" class="container-xl">
            @include('vuejs.partials.header')

@section('content')
            <div id="carouselExampleIndicators" class="carousel slide ratio ratio-4x3" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/images/demo/main.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/demo/event-1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/demo/event-2.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            @include('vuejs.partials.navbar')

            <h1>@{{ message }}</h1>

            <button @click="count++">
                點擊次數：@{{ count }}
            </button>
@show

            @include('vuejs.partials.footer')
        </div>
        @include('vuejs.layouts.scripts_end')
    </body>
</html>