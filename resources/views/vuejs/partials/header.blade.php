            <header>
@section('header')
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('index') }}">ChianIn 籤到</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link {{ active_class('index') }}" aria-current="page" href="{{ route('index') }}">首頁</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{ active_class('main-god.*') }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">主神</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'guanyin') }}" href="{{ route('main-god.index', ['name' => 'guanyin']) }}">觀世音菩薩</a></li>
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'mazu') }}" href="{{ route('main-god.index', ['name' => 'mazu']) }}">媽祖</a></li>
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'guandi') }}" href="{{ route('main-god.index', ['name' => 'guandi']) }}">關聖帝君</a></li>
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'tudigong') }}" href="{{ route('main-god.index', ['name' => 'tudigong']) }}">土地公</a></li>
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'xuantian') }}" href="{{ route('main-god.index', ['name' => 'xuantian']) }}">玄天上帝</a></li>
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'baosheng') }}" href="{{ route('main-god.index', ['name' => 'baosheng']) }}">保生大帝</a></li>
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'chenghuang') }}" href="{{ route('main-god.index', ['name' => 'chenghuang']) }}">城隍爺</a></li>
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'santaizi') }}" href="{{ route('main-god.index', ['name' => 'santaizi']) }}">三太子</a></li>
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'wangye') }}" href="{{ route('main-god.index', ['name' => 'wangye']) }}">王爺公</a></li>
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'yuelao') }}" href="{{ route('main-god.index', ['name' => 'yuelao']) }}">月老</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item {{ active_param_class('main-god.index', 'name', 'satan') }}" href="{{ route('main-god.index', ['name' => 'satan']) }}">撒旦</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ active_class('fortune.list') }}" aria-current="page" href="{{ route('fortune.list') }}">籤詩集</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{ active_class('lucky-number.*') }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">幸運號碼</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item {{ active_class('lucky-number.49-6') }}" href="{{ route('lucky-number.49-6') }}">49選6</a></li>
                                        <li><a class="dropdown-item {{ active_class('lucky-number.38-6-8-1') }}" href="{{ route('lucky-number.38-6-8-1') }}">38/8選6/1</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled">贊助</a>
                                </li>
                            </ul>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
@show
            </header>
