<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title', config('app.name')) | 籤到 | ChianIn</title>
        @include('vuejs.layouts.meta')
        @include('vuejs.layouts.style')
        @include('vuejs.layouts.scripts_head')
    </head>
    <body>
    <!-- Sticky Footer（黏性頁尾）class="d-flex flex-column min-vh-100" -->
        <div id="app" class="container-xl d-flex flex-column min-vh-100">
            @include('vuejs.partials.header')

            <!-- Sticky Footer（黏性頁尾）main class="flex-grow-1" -->
            <main class="flex-grow-1">
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
            </main>

            @include('vuejs.partials.footer')
        </div>
        @include('vuejs.layouts.scripts_end')
    </body>
</html>