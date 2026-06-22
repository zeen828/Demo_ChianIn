@extends('vuejs.layouts.html5')

@section('title', '首頁')

@section('content')
<div class="container my-5">
    <!-- 麵包屑導航 (SEO 加分) -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">首頁</a></li>
            <li class="breadcrumb-item"><a href="/fortune/list">籤詩集</a></li>
            <li class="breadcrumb-item active">{{ $fortune->title }}</li>
        </ol>
    </nav>

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