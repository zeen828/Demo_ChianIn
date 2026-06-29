@extends('vuejs.layouts.html5')

@section('title', $Title)

@section('style_custom')
        <style>
/* =========================
 籤號快速切換
========================= */

.fortune-selector{
    border-radius:12px;
    overflow:hidden;
}


.fortune-tabs{

    display:grid;

    /*
       自動塞滿
       100個也不爆版
    */
    grid-template-columns:
        repeat(auto-fill,minmax(48px,1fr));


    gap:10px;

}



/* 籤號按鈕 */

.fortune-item{

    height:42px;

    display:flex;

    align-items:center;
    justify-content:center;


    background:#faf8f2;

    border:1px solid #eadfc8;

    border-radius:8px;


    color:#555;

    text-decoration:none;

    font-size:16px;

    transition:.2s;

}



.fortune-item:hover{

    background:#f0e5c8;

    transform:translateY(-2px);

}



/* 目前籤 */

.fortune-item.active{

    background:#d2b26a;

    color:white;

    font-weight:bold;

    box-shadow:
        0 3px 8px rgba(0,0,0,.15);

}
        </style>
@endsection

@section('content')
                <div class="container py-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">首頁</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('fortune.list') }}">籤詩集</a></li>
                        </ol>
                    </nav>

                    <div class="row">
                        <!-- 左側主內容區 -->
                        <div class="col-lg-12">
<!-- 籤號快速切換 -->
<div class="card mb-4 fortune-selector">
@foreach($categoryDatas as $category)
    <div class="card-header">
        <h5 class="mb-0">
            <i class="bi bi-grid-3x3-gap"></i>
            {{ $category->name }}
        </h5>
    </div>

    <div class="card-body">
        <div class="fortune-tabs">
            <!-- Laravel 之後改 foreach -->
@foreach($category->fortunes as $fortune)
            <a href="{{ route('fortune.info', $fortune->id) }}" class="fortune-item">
                {{ $fortune->title }}
            </a>
@endforeach
        </div>
    </div>
@endforeach
</div>
                        </div>
                    </div>
                </div>
@endsection