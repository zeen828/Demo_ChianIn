            <header>
@section('header')
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">ChianIn</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">首頁</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">抽籤</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">主神</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'guanyin']) }}">觀世音菩薩</a></li>
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'mazu']) }}">媽祖</a></li>
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'guandi']) }}">關聖帝君</a></li>
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'tudigong']) }}">土地公</a></li>
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'xuantian']) }}">玄天上帝</a></li>
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'baosheng']) }}">保生大帝</a></li>
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'chenghuang']) }}">城隍爺</a></li>
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'santaizi']) }}">三太子</a></li>
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'wangye']) }}">王爺公</a></li>
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'yuelao']) }}">月老</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('main-god.show', ['name' => 'satan']) }}">撒旦</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled">不給點</a>
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
