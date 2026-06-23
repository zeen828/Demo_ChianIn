@extends('vuejs.layouts.html5')

@section('title', $MainGod->name . ' | 線上抽籤')

@section('style_custom')
        <style>
            /* ===== 擲杯 3D 動畫特效 ===== */
            .cup-container {
                perspective: 600px;
                display: flex;
                justify-content: center;
                gap: 2rem;
            }
            .cup-piece {
                display: inline-block;
            }
            .cup-piece i {
                display: inline-block !important;
                font-size: 4rem;
                color: #b02a37; /* 聖杯紅 */
            }
            /* 擲杯時的動畫：空中翻轉 + 落地彈跳 */
            .cup-flipping {
                animation: flipAndBounce 0.8s ease-out forwards;
            }
            @keyframes flipAndBounce {
                0% { transform: translateY(0) rotate(0deg) scale(1); }
                30% { transform: translateY(-100px) rotate(360deg) scale(1.3); }
                60% { transform: translateY(15px) rotate(720deg) scale(0.9); }
                80% { transform: translateY(-15px) rotate(900deg) scale(1.05); }
                100% { transform: translateY(0) rotate(1080deg) scale(1); }
            }
        </style>
@endsection

@section('content')
                <div class="container py-4">
                    <div class="text-center mb-4">
                        <h1 class="fw-bold">{{ $MainGod->name }} 線上求籤</h1>
                    </div>
                    <!-- 神像 -->
                    <div class="text-center mb-4">
                        <img src="{{ $MainGod->image_url }}" class="img-fluid rounded-circle shadow" alt="{{ $MainGod->name }}">
                    </div>
                    <div class="text-center mb-4">
                        <p class="text-muted">誠心敬意，神明指引</p>
                    </div>
                    <!-- 籤種 -->
                    <div class="card shadow-sm mb-4" v-if="currentStep === 'select'">
                        <div class="card-body">
                            <label class="form-label fw-bold">請選擇籤詩類型</label>
                            <select class="form-select form-select-lg" v-model="selectedSystem" @change="goToDrawStep">
                                <option value="">請選擇籤詩類型</option>
                                <option v-for="system in systems" :key="system.id" :value="system.id">
                                    @{{ system.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <!-- 抽籤 -->
                    <div class="card shadow-sm mb-4 p-4 text-center" v-if="currentStep === 'draw'">
                        <p class="text-muted">請靜心思考您想請示的事情，隨後按下抽籤。</p>
                        <div class="d-grid">
                            <button class="btn btn-danger btn-lg py-3" @click="drawLot" :disabled="loading">
                                <i class="bi bi-stars"></i>
                                @{{ loading ? '正在向神明求籤中...' : '誠心抽籤' }}
                            </button>
                        </div>
                        <button class="btn btn-link btn-sm mt-3 text-secondary" @click="resetAll" :disabled="loading">返回重選籤詩</button>
                    </div>
                    <!-- 擲杯 -->
                    <div class="card shadow mb-4" v-if="currentStep === 'cup'">
                        <div class="card-header text-center bg-danger bg-opacity-10 py-3">
                            <h5 class="mb-1 text-danger fw-bold">已抽得：@{{ lotResult?.title }}</h5>
                            <small class="text-muted">神意未定，需連續獲得 @{{ requiredShengbei }} 個聖杯才算數</small>
                        </div>
                        <div class="card-body text-center py-4">
                            <h5 class="mb-4">
                                聖杯進度：
                                <span class="badge bg-danger fs-5">@{{ currentShengbei }}</span> / @{{ requiredShengbei }}
                            </h5>
                            <div class="my-4 cup-container">
                                <div class="cup-piece" :class="{'cup-flipping': isFlipping}">
                                    <i style="transform: rotate(-30deg);">◖</i>
                                </div>
                                <div class="cup-piece" :class="{'cup-flipping': isFlipping}">
                                    <i style="transform: rotate(30deg);">◗</i>
                                </div>
                            </div>
                            <div style="min-height: 50px;">
                                <div v-if="cupResult" class="fs-4">
                                    本次結果：
                                    <span :class="{ 'text-success': cupResult === '聖杯', 'text-warning': cupResult === '笑杯', 'text-danger': cupResult === '陰杯'}" class="fw-bold">
                                        @{{ cupResult }}
                                    </span>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-8 mx-auto mt-3">
                                <button class="btn btn-warning btn-lg shadow-sm fw-bold" @click="throwCup" :disabled="isFlipping">
                                    <i class="bi bi-hand-index-thumb"></i> @{{ isFlipping ? '敲杯落地中...' : '擲杯確認' }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- 結果 -->
                    <div class="card shadow border-success" v-if="currentStep === 'result'">
                        <div class="card-header text-center bg-success text-white py-3">
                            <h3 class="mb-0 fw-bold"><i class="bi bi-check-circle-fill"></i> 最終確認聖籤</h3>
                        </div>
                        <div class="card-body text-center py-4">
                            <h2 class="text-danger fw-bold mb-3">@{{ lotResult?.title }}</h2>
                            <h5 class="badge bg-secondary fs-6 mb-4">@{{ lotResult?.level }}</h5>
                            <hr>
                            <p class="text-start fs-5 text-muted px-3 my-4" v-html="lotResult?.content"></p>
                            <hr>
                            <div class="row g-2 mt-4">
                                <div class="col-6">
                                    <button class="btn btn-primary w-100 py-2">查看解籤說明</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-secondary w-100 py-2" @click="resetAll">再求一籤</button>
                                </div>
                            </div>
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
                        // ===== 流程狀態控制 =====
                        // 'select': 選籤詩 | 'draw': 抽籤按鈕 | 'cup': 擲杯中 | 'result': 顯示最終解籤
                        maingodSlug: '{{ $MainGod->slug }}',
                        currentStep: 'select', 
                        // ===== 抽籤 =====
                        systems: [],// 籤詩系統列表
                        selectedSystem: '',// 目前選擇的籤詩系統
                        lotResult: null,// 抽籤結果
                        loading: false,// 是否正在讀取
                        // ===== 擲杯 =====
                        requiredShengbei: 3,// 需要幾個聖杯
                        currentShengbei: 0,// 目前累積聖杯
                        cupR: '正',
                        cupL: '正',
                        cupResult: null,// 最近一次結果
                        waitingForCup: false,// 是否進入擲杯階段
                        isFlipping: false// 是否正在播放擲杯動畫
                    };
                },
                mounted() {
                    console.log('Vue 已載入');
                    // 頁面開啟先載入籤詩系統
                    this.loadSystems();
                },
                methods: {
                    // 讀取籤詩類型
                    async loadSystems() {
                        try {
                            const response = await Fortune.loadSystems(this.maingodSlug);
                            this.systems = response.data.resource_data;
                        } catch (error) {
                            console.error('載入系統失敗:', error);
                        }
                    },
                    // 選擇籤詩系統後切換到抽籤階段
                    goToDrawStep() {
                        if (this.selectedSystem) {
                            this.currentStep = 'draw';
                        }
                    },
                    // 抽籤
                    async drawLot() {
                        if (!this.selectedSystem) {
                            alert('請選擇籤詩類型');
                            return;
                        }
                        this.loading = true;
                        try {
                            const response = await Fortune.draw(this.selectedSystem);
                            this.lotResult = response.data.data;
                            // 初始化擲杯狀態，並切換到擲杯介面
                            this.currentShengbei = 0;
                            this.cupResult = null;
                            this.currentStep = 'cup'; 
                        } catch (error) {
                            console.error(error);
                            alert('向神明求籤失敗，請稍後再試');
                        } finally {
                            this.loading = false;
                        }
                    },
                    // 執杯
                    async throwCup() {
                        if (this.isFlipping) return;
                        // 先清空上一次結果、移除 Class 類別
                        this.isFlipping = false;
                        this.cupResult = null;
                        // 異步微小延遲，確保 DOM Class 重置以再次觸發動畫
                        setTimeout(() => {
                            this.isFlipping = true;
                            // 動畫完結後（0.8 秒）運算概率結果
                            setTimeout(() => {
                                const left = Math.random() < 0.5 ? '正' : '反';
                                const right = Math.random() < 0.5 ? '正' : '反';
                                this.cupR = right;
                                this.cupL = left;
                                if (left !== right) {
                                    this.cupResult = '聖杯';
                                    this.currentShengbei++;
                                } else if (left === '正') {
                                    this.cupResult = '笑杯';
                                    this.currentShengbei = 0; // 進度歸零
                                } else {
                                    this.cupResult = '陰杯';
                                    this.currentShengbei = 0; // 進度歸零
                                }
                                this.isFlipping = false;
                                // 判斷邏輯分支
                                if (this.currentShengbei >= this.requiredShengbei) {
                                    // 成功連三聖杯，展示結果
                                    this.currentStep = 'result';
                                } else if (this.currentShengbei === 0) {
                                    // 擲出笑杯或陰杯，提示使用者並自動退回抽籤步驟
                                    alert(`神明給予【${this.cupResult}】，代表此籤不對，請重新抽籤！`);
                                    this.currentStep = 'draw';
                                }
                            }, 800);
                        }, 20);
                    },
                    // 全域狀態完全重置
                    resetAll() {
                        this.selectedSystem = '';
                        this.lotResult = null;
                        this.currentShengbei = 0;
                        this.cupResult = null;
                        this.currentStep = 'select';
                    }
                }
            }).mount('#app');
        </script>
@endsection
