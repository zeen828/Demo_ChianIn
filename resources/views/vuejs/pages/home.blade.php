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
                    <img src="/images/main_god/{{ $name }}.png" class="img-fluid rounded-circle shadow" alt="主神">
                </div>
                <!-- 籤種 -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <label class="form-label">
                            籤詩類型選擇
                        </label>
                        <select class="form-select" v-model="selectedSystem">
                            <option value="">
                                請選擇籤詩系統
                            </option>
                            <option v-for="system in systems" :key="system.id" :value="system.id">
                                @{{ system.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <!-- 抽籤 -->
                <div class="d-grid mb-4">
                    <button class="btn btn-danger btn-lg" @click="drawLot" :disabled="loading">
                        <i class="bi bi-stars"></i>
                        @{{ loading ? '抽籤中...' : (lotResult ? '重新抽籤' : '開始抽籤') }}
                    </button>
                </div>
                <!-- 擲杯 -->
                <div class="card shadow mb-4" v-if="lotResult && waitingForCup">
                    <div class="card-header text-center">
                        <h4>請擲杯確認此籤</h4>
                    </div>
                    <div class="card-body text-center">
                        <h5>
                            聖杯進度：
                            @{{ currentShengbei }} / @{{ requiredShengbei }}
                        </h5>
                        <div v-if="cupResult" class="my-3">
                            本次結果：
                            <strong>@{{ cupResult }}</strong>
                        </div>
                        <button class="btn btn-warning btn-lg" @click="throwCup">
                            擲杯
                        </button>
                    </div>
                </div>
                <!-- 結果 -->
                <div class="card shadow" v-if="lotResult && !waitingForCup">
                    <div class="card-header text-center">
                        <h3 class="mb-0">
                            @{{ lotResult.title }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center mb-4">
                            @{{ lotResult.level }}
                        </h5>
                        <p class="text-center text-muted" v-html="lotResult.content">
                        </p>
                    </div>
                </div>
                <!-- 按鈕 -->
                <div class="row mt-4">
                    <div class="col-6">
                        <button class="btn btn-outline-primary w-100">
                            查看解籤
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-secondary w-100" @click="drawLot">
                            重新抽籤
                        </button>
                    </div>
                </div>
            </div>
@endsection

@section('script_end_custom')
        <script src="/vue_js/api.js"></script>
        <script src="/vue_js/fortune.js"></script>
        <script>
        const { createApp } = Vue;
        createApp({
            data() {
                return {
                    message: 'Laravel 12 + Vue 3',
                    count: 0,
                    // 籤詩系統列表
                    systems: [],
                    // 目前選擇的籤詩系統
                    selectedSystem: '',
                    // 抽籤結果
                    lotResult: null,
                    // 是否正在讀取
                    loading: false,
                    // ===== 擲杯 =====
                    requiredShengbei: 3, // 需要幾個聖杯
                    currentShengbei: 0,  // 目前累積聖杯
                    cupResult: null,     // 最近一次結果
                    waitingForCup: false // 是否進入擲杯階段
                };
            },
            mounted() {
                console.log('Vue 已載入');
                // 頁面開啟先載入籤詩系統
                this.loadSystems();
            },
            methods: {
                async loadSystems() {
                    const response = await Fortune.loadSystems();
                    this.systems = response.data.resource_data;
                },
                async drawLot() {
                    if (!this.selectedSystem) {
                        alert('請選擇籤詩');
                        return;
                    }
                    this.loading = true;
                    try {
                        const response =await Fortune.draw(
                                this.selectedSystem
                        );
                        this.lotResult = response.data.data;
                        // 初始化擲杯
                        this.currentShengbei = 0;
                        this.cupResult = null;
                        this.waitingForCup = true;
                    }
                    finally {
                        this.loading = false;
                    }
                },
                throwCup() {
                    const left = Math.random() < 0.5 ? '正' : '反';
                    const right = Math.random() < 0.5 ? '正' : '反';
                    if (left !== right) {
                        this.cupResult = '聖杯';
                        this.currentShengbei++;
                    } else if (left === '正') {
                        this.cupResult = '笑杯';
                        this.currentShengbei = 0;
                    } else {
                        this.cupResult = '陰杯';
                        this.currentShengbei = 0;
                    }
                    if (this.currentShengbei >= this.requiredShengbei) {
                        this.waitingForCup = false;
                    }
                }
            }
        }).mount('#app');
        </script>
@endsection
