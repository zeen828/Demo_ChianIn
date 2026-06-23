@extends('vuejs.layouts.html5')

@section('title', $Title)

@section('style_custom')
        <style>
            :root {
                --primary-red: #b32d2e; /* 硃砂紅 */
                --gold-accent: #d4af37; /* 香檳金 */
                --paper-bg: #fdfaf6;    /* 宣紙底色 */
            }
            body { background-color: var(--paper-bg); font-family: "PingFang TC", "Microsoft JhengHei", sans-serif; }
            /* 號碼球優化：改為米白底、金色邊框 */
            .lotto-ball {
                display: inline-flex; align-items: center; justify-content: center;
                width: 40px; height: 40px; font-size: 1rem; border-radius: 50%;
                font-weight: 700; color: #4a3c31;
                background: #fffdf5;
                border: 2px solid var(--gold-accent);
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            /* 平板與電腦版（>= 576px）再回復到大尺寸 */
            @media (min-width: 576px) {
                .lotto-ball {
                    width: 42px;
                    height: 42px;
                    font-size: 1.1rem;
                    box-shadow: inset -3px -3px 6px rgba(0,0,0,0.2), 3px 3px 6px rgba(0,0,0,0.15);
                }
            }
            /* 根據大樂透常規顏色分類（雙數組別換個顏色點綴） */
            .lotto-row:nth-child(even) .lotto-ball {
                background: radial-gradient(circle at 30% 30%, #ffffff 0%, #e6f7ff 40%, #bae7ff 100%);
                border-color: #91d5ff;
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
                        <p class="text-muted">參考大樂透 49選6 隨機號碼生成</p>
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
                                    <button class="btn btn-danger btn-lg w-100 py-2 fw-bold" @click="generateLottoNumbers" :disabled="isRolling">
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
                            <h6 class="text-secondary mb-0">號碼已完成：</h6>
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
                                <!-- 號碼球容器：手機版間距設為 gap-1，電腦版 gap-sm-2 -->
                                <div class="d-flex gap-1 gap-sm-2 justify-content-center">
                                    <div v-for="(num, numIdx) in group" :key="numIdx" class="lotto-ball ball-pop-enter-active">
                                        @{{ formatNumber(num) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 初始提示畫面 -->
                    <div class="text-center py-5 border rounded bg-light" v-else>
                        <i class="bi bi-egg-fried text-muted display-4"></i>
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
                        countToGenerate: 1, // 預設產生筆數
                        lottoResults: [],   // 存放產生的號碼陣列
                        isRolling: false    // 動畫防重複點擊開關
                    }
                },
                methods: {
                    // 生成大樂透號碼核心演算法
                    generateLottoNumbers() {
                        this.isRolling = true;
                        this.lottoResults = []; // 先清空舊號碼
                        // 模擬開獎機搖晃的微小體感延遲（0.3秒）
                        setTimeout(() => {
                            const allGroups = [];
                            for (let i = 0; i < this.countToGenerate; i++) {
                                const uniqueNumbers = new Set();
                                // 抽滿不重複的 6 個號碼
                                while (uniqueNumbers.size < 6) {
                                    const randomNum = Math.floor(Math.random() * 49) + 1; // 1 ~ 49
                                    uniqueNumbers.add(randomNum);
                                }
                                // 將 Set 轉為陣列，並由小到大進行排序（提升彩迷體驗）
                                const sortedGroup = Array.from(uniqueNumbers).sort((a, b) => a - b);
                                allGroups.push(sortedGroup);
                            }
                            this.lottoResults = allGroups;
                            this.isRolling = false;
                        }, 350);
                    },
                    // 補零排版（例如 7 變成 "07"）
                    formatNumber(num) {
                        return num < 10 ? `0${num}` : num;
                    },
                    // 清空重置
                    clearResults() {
                        this.lottoResults = [];
                    }
                }
            }).mount('#app');
        </script>
@endsection
