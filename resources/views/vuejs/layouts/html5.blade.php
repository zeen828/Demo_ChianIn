<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title', config('app.name'))</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('description', '網站描述')">
        <meta name="author" content="@yield('author', 'will')">
@yield('meta')
        @include('vuejs.layouts.style')
    </head>
    <body>
        <div id="app" class="container">
            @include('vuejs.partials.header')
            <h1>@{{ message }}</h1>

            <button @click="count++">
                點擊次數：@{{ count }}
            </button>
@yield('content')
            @include('vuejs.partials.footer')
        </div>
        @include('vuejs.layouts.scripts')
    </body>
</html>