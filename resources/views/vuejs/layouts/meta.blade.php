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
@yield('meta_custom')
