@extends('vuejs.layouts.html5')

@section('title', $Title)

@section('style_custom')
        <style>
            /* =========================
            卷軸背景
            ========================= */
            .scroll-content {
                /* 卷軸背景圖 */
                background: url('/images/custom/fortune-bg.png')
                            center center / 100% 100% no-repeat;
                min-height: 500px;
                /* 讓文字不要貼近卷軸邊框 */
                padding:
                    80px   /* 上 */
                    120px  /* 右 */
                    80px   /* 下 */
                    120px; /* 左 */
                position: relative;
                z-index: 1;
            }
            /* =========================
            籤詩直書容器
            ========================= */
            .fortune-container {
                display: flex;
                /* 由右往左排列欄位 */
                flex-direction: row;
                /* 內容置中 */
                justify-content: center;
                min-height: 500px;
            }
            /* =========================
            共用直書設定
            ========================= */
            .fortune-title,
            .fortune-column {
                /* 傳統中文直排 */
                writing-mode: vertical-rl;
                text-orientation: upright;
            }
            /* =========================
            籤詩標題
            ========================= */
            .fortune-title {
                font-size: 2rem;
                font-weight: bold;
                /* 與籤詩內容保持距離 */
                margin-left: 40px;
            }
            /* =========================
            籤詩內容
            ========================= */
            .fortune-column {
                font-size: 1.5rem;
                line-height: 2;
                /* 欄位間距 */
                margin-left: 20px;
            }

            /* =========================
            解詩 & 備註
            ========================= */
            .section-title{
                font-size:1.1rem;
                color:#666;
                margin-bottom:18px;
                padding-bottom:8px;
                border-bottom:1px solid #ececec;
            }
            .fortune-explain{
                display:grid;
                grid-template-columns:repeat(2,1fr);
                gap:12px 30px;
                padding:20px;
                background:#faf8f2;
                border:1px solid #eadfc8;
                border-radius:10px;
            }
            .fortune-explain div{
                font-size:18px;
                letter-spacing:2px;
                color:#444;
                padding:6px 0;
                border-bottom:1px dashed #ddd;
            }
            .fortune-note{
                background:#fcfcfc;
                border-left:4px solid #d2b26a;
                padding:18px 22px;
                line-height:2;
                font-size:16px;
                color:#555;
                border-radius:6px;
            }
            .card-body{
                padding:2rem;
            }
            .card-body + .card-body{
                border-top:1px solid #efefef;
            }
            .fortune-explain,
            .fortune-note{
                background:
                    linear-gradient(rgba(255,255,255,.92),rgba(255,255,255,.92)),
                    url('/images/paper-bg.png');
                box-shadow:
                    inset 0 0 20px rgba(0,0,0,.03);
            }
            /* =========================
            籤到印章
            ========================= */
            .fortune-seal {
                position: absolute;
                /* 左下角位置 */
                left: 260px;
                bottom: 140px;
                width: 90px;
                height: auto;
                /* 微透明增加真實感 */
                opacity: 0.85;
                /* 微微傾斜 */
                transform: rotate(15deg);
                z-index: 10;
                /* 不影響滑鼠操作 */
                pointer-events: none;
            }


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
                            <li class="breadcrumb-item">{{ $fortune->fortuneCategory->name }}</li>
                            <li class="breadcrumb-item active">{{ $fortune->title }}</li>
                        </ol>
                    </nav>

                    <div class="row">
                        <!-- 左側主內容區 -->
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h2 class="mb-0">
                                        {{ $fortune->fortuneCategory->name }}
                                        <span class="fs-5 text-muted">{{ $fortune->title }}</span>
                                    </h2>
                                    {{ $fortune->level }}
                                    {{ $fortune->code }}
                                </div>

                                <div class="card-body">
                                    <h5 class="text-muted"><i class="bi bi-journal-medical"></i> 籤詩</h5>
                                    <div class="text-center scroll-content fortune-container">
                                        <img src="{{ asset('/images/custom/seal-1.png') }}" class="fortune-seal" alt="籤到章">
                                        <p class="card-text fortune-column">{!! $fortune->content !!}</p>
                                        <h5 class="card-title fortune-title">{{ $fortune->title }}</h5>
                                    </div>
                                </div>
@if($fortune->summary)
                                <div class="card-body">
                                    <h5 class="section-title">
                                        <i class="bi bi-list-columns-reverse"></i>
                                        解詩
                                    </h5>
                                    <div class="fortune-explain">
@foreach($fortune->summary_items  as $item)
@if(trim($item) !== '')
                                        <div>{{ trim($item) }}</div>
@endif
@endforeach
                                    </div>
                                </div>
@endif

@if($fortune->memo)
                                <div class="card-body">
                                    <h5 class="section-title">
                                        <i class="bi bi-chat-left-text"></i>
                                        備註
                                    </h5>

                                    <div class="fortune-note">
                                        {!! $fortune->memo !!}
                                    </div>
                                </div>
@endif
                                <div class="card-footer">
                                    <p>{{ $fortune->code }}</p>
                                    {{ $fortune->level }}
                                </div>
                            </div>


<!-- 籤號快速切換 -->
<div class="card mb-4 fortune-selector">

    <div class="card-header">
        <h5 class="mb-0">
            <i class="bi bi-grid-3x3-gap"></i>
            同類籤號快速查看
        </h5>
    </div>


    <div class="card-body">


        <div class="fortune-tabs">

            <!-- Laravel 之後改 foreach -->

            <a href="#" class="fortune-item">
                1
            </a>

            <a href="#" class="fortune-item">
                2
            </a>

            <a href="#" class="fortune-item">
                3
            </a>

            <a href="#" class="fortune-item">
                4
            </a>


            <a href="#" class="fortune-item active">
                21
            </a>


            <a href="#" class="fortune-item">
                100
            </a>


        </div>


    </div>

</div>
                        </div>
                        <!-- 右側輔助區 -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <!-- 詩籤圖片 -->
@if($fortune->image_url)
                                    <img src="{{ asset($fortune->image_url) }}" class="card-img-top" alt="{{ $fortune->title }}">
@endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection