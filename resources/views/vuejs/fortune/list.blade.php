@extends('vuejs.layouts.html5')

@section('title', '籤詩集')

@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">首頁</a></li>
            <li class="breadcrumb-item active">籤詩集</li>
        </ol>
    </nav>

    <h2 class="mb-4">籤詩集錦</h2>
    
    @foreach($categories as $category)
        <div class="mb-5">
            <h3 class="border-start border-4 border-primary ps-3 mb-3">{{ $category->name }}</h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($category->fortunes as $fortune)
                    <div class="col">
                        <div class="card h-100 shadow-sm hover-shadow transition">
                            <div class="card-body">
                                <h5 class="card-title">{{ $fortune->title }}</h5>
                                <p class="card-text text-truncate">{{ $fortune->content }}</p>
                                <a href="{{ route('fortune.info', $fortune->id) }}" class="btn btn-outline-primary btn-sm">查看詳情</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection