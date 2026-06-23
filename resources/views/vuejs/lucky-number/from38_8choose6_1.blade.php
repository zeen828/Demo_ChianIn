@extends('vuejs.layouts.html5')

@section('title', $Title)

@section('style_custom')
        <style>
            /* ===== 樂透球基礎樣式（響應式：手機版較小） ===== */
            .lotto-ball {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 32px;
                height: 32px;
                font-size: 0.9rem;
                border-radius: 50%;
                font-weight: bold;
                transition: all 0.3s ease;
            }
            /* 第一區：經典藍色球 */
            .zone-1 {
                color: #0c5460;
                background: radial-gradient(circle at 30% 30%, #ffffff 0%, #e6f7ff 40%, #bae7ff 100%);
                border: 1px solid #91d5ff;
                box-shadow: inset -2px -2px 4px rgba(0,0,0,0.15), 2px 2px 4px rgba(0,0,0,0.1);
            }
            /* 第二區：特別號金黃色球 */
            .zone-2 {
                color: #fff;
                background: radial-gradient(circle at 30% 30%, #ffe58f 0%, #faad14 50%, #d46b08 100%);
                border: 1px solid #d46b08;
                box-shadow: inset -2px -2px 4px rgba(0,0,0,0.25), 2px 2px 5px rgba(212, 107, 8, 0.4);
            }
            /* 平板與電腦版（>= 576px）回復放大尺寸 */
            @media (min-width: 576px) {
                .lotto-ball {
                    width: 40px;
                    height: 40px;
                    font-size: 1.05rem;
                }
            }
            /* 區塊分隔線樣式 */
            .zone-divider {
                align-self: center;
                font-size: 1.2rem;
                color: #ccc;
                font-weight: 300;
            }
            /* 產生號碼時的放大浮現動畫 */
            .ball-pop-enter-active {
                animation: ballPop 0.4s ease-out forwards;
            }
            @keyframes ballPop {
                0% { transform: scale(0) rotate(-180deg); opacity: 0; }
                70% { transform: scale(1.1) rotate(10deg); opacity: 1; }
                100% { transform: scale(1) rotate(0deg); }
            }
        </style>
@endsection

@section('content')
                <!-- ===== 主要核心區塊 ===== -->
                <div class="container py-4">
                    <!-- 標題說明 -->
                    <div class="text-center mb-4">
                        <h1 class="fw-bold text-danger"><i class="bi bi-ticket-perforated"></i> 天官賜福</h1>
                        <p class="text-muted">參考威力彩 38選6 + 8選1 隨機號碼生成</p>
                    </div>
                    <!-- 控制卡片 -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body align-items-end g-3">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fw-bold">請選擇產生筆數 (最多 10 筆)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <select class="form-select form-select-lg" v-model.number="countToGenerate">
                                        <option v-for="n in 10" :key="n" :value="n">@{{ n }} 筆結果</option>
                                    </select>
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-danger btn-lg w-100 py-2 fw-bold" @click="generateSuperLottery" :disabled="isRolling">
                                        <i class="bi bi-arrow-repeat" :class="{'spin': isRolling}"></i>
                                        @{{ isRolling ? '抽球' : '生成' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 結果顯示區塊 -->
                    <div v-if="lottoResults.length > 0">
                        <div class="d-flex justify-content-between align-items-center mb-2 px-1">
                            <h6 class="text-secondary small mb-0">號碼已完成 (藍球為第一區，黃球為第二區)：</h6>
                            <button class="btn btn-outline-secondary btn-sm" @click="clearResults">清空</button>
                        </div>
                        <!-- 號碼清單 -->
                        <div class="card shadow-sm mb-3 lotto-row" v-for="(group, index) in lottoResults" :key="index">
                            <!-- 用 flex-column 和 flex-sm-row 達成：手機時直式排列，平板以上橫式排列 -->
                            <div class="card-body d-flex flex-column flex-sm-row align-items-center justify-content-between py-3 gap-2">
                                <!-- 組別標籤 -->
                                <span class="badge bg-primary rounded-pill fs-6 px-3">
                                    第 @{{ index + 1 }} 組
                                </span>
                                <!-- 雙區號碼容器（優化手機防破版間距） -->
                                <div class="d-flex gap-1 gap-sm-2 justify-content-center">
                                    <!-- 第一區 6 顆藍球 -->
                                    <div v-for="(num, numIdx) in group.zone1" :key="'z1-'+numIdx" class="lotto-ball zone-1 ball-pop-enter-active">
                                        @{{ formatNumber(num) }}
                                    </div>
                                    <!-- 視覺分隔加號 -->
                                    <div class="zone-divider px-1 text-muted fw-bold">+</div>
                                    <!-- 第二區 1 顆黃球 -->
                                    <div class="lotto-ball zone-2 ball-pop-enter-active">
                                        @{{ formatNumber(group.zone2) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 初始提示畫面 -->
                    <div class="text-center py-5 border rounded bg-light" v-else>
                        <i class="bi bi-lightning-charge text-warning display-4"></i>
                        <p class="text-muted mt-2 mb-0">誠心默念祈願，選擇筆數後點擊按鈕即可開出神明號碼。</p>
                    </div>
                    @include('vuejs.lucky-number.warning')
                </div>
@endsection

@section('script_end_custom')
        <script>
            const { createApp } = Vue
            createApp({
                data() {
                    return {
                        countToGenerate: 1,
                        lottoResults: [], // 結構調整為：[{ zone1: [1,2,3,4,5,6], zone2: 8 }]
                        isRolling: false
                    }
                },
                methods: {
                    // 威力彩雙區生成演算法
                    generateSuperLottery() {
                        this.isRolling = true;
                        this.lottoResults = [];
                        setTimeout(() => {
                            const allGroups = [];
                            for (let i = 0; i < this.countToGenerate; i++) {
                                // 1. 第一區 38 選 6（不重複）
                                const z1Set = new Set();
                                while (z1Set.size < 6) {
                                    const randomNum = Math.floor(Math.random() * 38) + 1; // 1 ~ 38
                                    z1Set.add(randomNum);
                                }
                                const sortedZone1 = Array.from(z1Set).sort((a, b) => a - b);
                                // 2. 第二區 8 選 1
                                const randomZone2 = Math.floor(Math.random() * 8) + 1; // 1 ~ 8
                                // 3. 打包成物件存入
                                allGroups.push({
                                    zone1: sortedZone1,
                                    zone2: randomZone2
                                });
                            }
                            this.lottoResults = allGroups;
                            this.isRolling = false;
                        }, 350);
                    },
                    formatNumber(num) {
                        return num < 10 ? `0${num}` : num;
                    },
                    clearResults() {
                        this.lottoResults = [];
                    }
                }
            }).mount('#app');
        </script>
@endsection
