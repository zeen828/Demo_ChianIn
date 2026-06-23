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
            未使用 (可刪除)
            ========================= */

            /*
            .scroll-container {
                position: relative;
                min-height: 500px;
            }

            .vertical-text {
                writing-mode: vertical-rl;
            }

            .vertical-poem {
                writing-mode: vertical-rl;
                text-orientation: upright;
                line-height: 2;
            }
            */
        </style>
@endsection

@section('content')
<div class="container my-5">

    <div class="card text-center">
        <div class="card-header">
        Featured
        </div>
        <div class="card-body scroll-content fortune-container">
            <img src="{{ asset('/images/custom/seal-1.png') }}" class="fortune-seal" alt="籤到章">
            <p class="card-text fortune-column">{!! $fortune->content !!}</p>
            <h5 class="card-title fortune-title">{{ $fortune->title }}</h5>
        </div>
        <div class="card-footer">
        2 days ago
        </div>
    </div>

    <div class="row">
        <!-- 左側主內容區 -->
        <main class="col-lg-8">
            <article class="card p-4 shadow-sm">
                <!-- 標題與吉凶 -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="h2 text-primary">{{ $fortune->title }}</h1>
                    <span class="badge {{ $fortune->level === '大吉' ? 'bg-success' : 'bg-secondary' }} fs-6">
                        {{ $fortune->level }}
                    </span>
                </div>

                <div class="border-bottom pb-4 mb-4">
                    <h5 class="text-muted"><i class="bi bi-journal-text"></i> 籤詩內容</h5>
                    <div class="fs-4 py-3 text-center bg-light rounded">
                        {!! $fortune->content !!}
                    </div>
                </div>

                <!-- 更丁 (若有特定排版需求) -->
                @if($fortune->code)
                <div class="mb-4">
                    <h5 class="text-muted">更丁/卦頭</h5>
                    <p>{{ $fortune->code }}</p>
                </div>
                @endif

                <!-- 解說詩籤 -->
                <div class="mb-4">
                    <h5 class="text-muted"><i class="bi bi-chat-left-text"></i> 詳細解說</h5>
                    <div class="content-body">
                        {!! $fortune->content !!}
                    </div>
                </div>
            </article>

            <!-- 頁面切換：上一支/下一支 -->
            <div class="d-flex justify-content-between mt-4">
                <a href="" class="btn btn-outline-primary">« 上一支</a>
                <a href="" class="btn btn-outline-primary">下一支 »</a>
            </div>
        </main>

        <!-- 右側輔助區 -->
        <aside class="col-lg-4 mt-4 mt-lg-0">
            <!-- 詩籤圖片 -->
            @if($fortune->image_url)
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset($fortune->image_url) }}" class="card-img-top" alt="{{ $fortune->title }}">
                <div class="card-body">
                    <p class="card-text text-center text-muted small">{{ $fortune->title }} 籤文圖</p>
                </div>
            </div>
            @endif

            <!-- 快速操作區 -->
            <div class="card p-3 shadow-sm">
                <h5>相關資訊</h5>
                <p class="small text-muted">若對籤詩有疑問，建議可前往當地廟宇請示專業執事人員。</p>
                <a href="#" class="btn btn-success w-100 mb-2">分享籤詩</a>
            </div>
        </aside>
    </div>
</div>
@endsection