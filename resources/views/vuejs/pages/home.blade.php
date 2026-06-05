@extends('vuejs.layouts.html5')

@section('title', '首頁')

@section('content')
<div class="container py-4">

    <!-- Logo -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">
            線上求籤
        </h1>

        <p class="text-muted">
            誠心敬意，神明指引
        </p>
    </div>

    <!-- 神像 -->
    <div class="text-center mb-4">

        <img
            src="https://placehold.co/300x300"
            class="img-fluid rounded-circle shadow"
            alt="神像">

    </div>

    <!-- 籤種 -->
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <label class="form-label">
                籤詩系統
            </label>

            <select class="form-select">

                <option>
                    觀音一百籤
                </option>

                <option>
                    雷雨師一百籤
                </option>

                <option>
                    六十甲子籤
                </option>

            </select>

        </div>

    </div>

    <!-- 抽籤 -->
    <div class="d-grid mb-4">

        <button class="btn btn-danger btn-lg">

            <i class="bi bi-stars"></i>

            開始抽籤

        </button>

    </div>

    <!-- 結果 -->
    <div class="card shadow">

        <div class="card-header text-center">

            <h3 class="mb-0">
                第二十八籤
            </h3>

            <span class="badge bg-success">
                上上籤
            </span>

        </div>

        <div class="card-body">

            <h5 class="text-center mb-4">
                東邊月上正嬋娟
            </h5>

            <p class="text-center text-muted">
                功名得意與君顯，
                前程萬里福綿綿。
            </p>

        </div>

    </div>

    <!-- 按鈕 -->
    <div class="row mt-4">

        <div class="col-6">

            <button
                class="btn btn-outline-primary w-100">

                查看解籤

            </button>

        </div>

        <div class="col-6">

            <button
                class="btn btn-outline-secondary w-100">

                重新抽籤

            </button>

        </div>

    </div>

</div>

@endsection