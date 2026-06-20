@extends('vuejs.layouts.html5')

@section('title', '首頁')

@section('style_custom')
        <style>
            /* ===== 籤詩網格視覺樣式 ===== */
            .fortune-card {
                cursor: pointer;
                transition: all 0.25s ease-in-out;
                border: 1px solid #dee2e6;
                background-color: #fff;
            }
            
            /* 滑鼠懸停效果：微幅浮起、紅色邊框提升儀式感 */
            .fortune-card:hover {
                transform: translateY(-4px);
                border-color: #b02a37;
                box-shadow: 0 6px 15px rgba(176, 42, 55, 0.15);
            }

            .fortune-card .card-badge {
                font-size: 0.75rem;
                position: absolute;
                top: 10px;
                right: 10px;
            }

            /* 側邊欄動態作用項樣式 */
            .list-group-item.active {
                background-color: #b02a37 !important;
                border-color: #b02a37 !important;
            }

            /* 詩籤彈窗樣式優化 */
            .modal-fortune-title {
                color: #b02a37;
                font-weight: bold;
            }
            .fortune-poem-text {
                font-family: "Noto Serif TC", "Georgia", serif;
                letter-spacing: 2px;
                line-height: 2;
            }
        </style>
@endsection

@section('content')
            <div class="container py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">首頁</a></li>
                        <li class="breadcrumb-item active" aria-current="page">籤詩全集</li>
                    </ol>
                </nav>

                <div class="text-center text-md-start mb-4 border-bottom pb-3">
                    <h1 class="fw-bold"><i class="bi bi-journal-text text-danger"></i> 籤詩解說大全</h1>
                    <p class="text-muted mb-0">收錄歷代傳統經典籤詩，提供完整聖意詳解。支持快捷複製與社群分享。</p>
                </div>

                <div class="row g-4">
                    <div class="col-12 col-md-3">
                        <div class="card shadow-sm sticky-top" style="top: 20px; z-index: 10;">
                            <div class="card-header bg-dark text-white fw-bold">
                                <i class="bi bi-filter-left"></i> 選擇籤詩系統
                            </div>
                            <div class="list-group list-group-flush d-flex flex-row flex-md-column overflow-auto text-nowrap">
                                <button 
                                    v-for="system in systems" 
                                    :key="system.id"
                                    type="button" 
                                    class="list-group-item list-group-item-action py-3 text-center text-md-start"
                                    :class="{ 'active': selectedSystemId === system.id }"
                                    @click="selectSystem(system.id)"
                                >
                                    @{{ system.name }} <span class="badge bg-secondary rounded-pill float-md-end d-none d-md-inline">@{{ system.total }} 首</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-9">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-bold text-secondary mb-0">
                                @{{ currentSystemName }} <small class="fs-6 text-muted">(@{{ filteredLots.length }}首)</small>
                            </h4>
                            <div class="input-group style-search" style="max-width: 220px;">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                                <input type="text" class="form-control border-start-0 ps-0" placeholder="輸入籤號或吉凶..." v-model="searchQuery">
                            </div>
                        </div>

                        <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-4 g-3">
                            <div class="col" v-for="lot in filteredLots" :key="lot.id">
                                <div class="card h-100 shadow-sm fortune-card position-relative p-3 text-center" @click="openModal(lot)">
                                    <span class="badge card-badge" :class="getBadgeClass(lot.level)">
                                        @{{ lot.level }}
                                    </span>
                                    <div class="card-body d-flex flex-column justify-content-center pt-3 pb-2">
                                        <h5 class="card-title fw-bold text-dark mb-1">@{{ lot.title }}</h5>
                                        <p class="card-text text-muted small text-truncate mt-1">@{{ stripHtml(lot.content) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center py-5 border rounded bg-light mt-3" v-if="filteredLots.length === 0">
                            <i class="bi bi-patch-question text-muted display-4"></i>
                            <p class="text-muted mt-2 mb-0">找不到對應的籤詩號碼，請換個關鍵字搜尋。</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="fortuneDetailModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow-lg border-0">
                        <div class="modal-header border-0 bg-light">
                            <span class="badge fs-6" :class="getBadgeClass(activeLot?.level)">@{{ activeLot?.level }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center px-4 pb-4">
                            <h2 class="modal-fortune-title mb-4" id="modalTitle">@{{ activeLot?.title }}</h2>
                            
                            <div class="p-3 bg-light rounded border border-dashed mb-4">
                                <p class="fs-5 fw-bold text-dark fortune-poem-text my-2" v-html="activeLot?.content"></p>
                            </div>
                            
                            <div class="row g-2">
                                <div class="col-6">
                                    <button class="btn btn-outline-danger w-100" @click="copyShareLink">
                                        <i class="bi bi-link-45deg"></i> 複製分享連結
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-success w-100" @click="shareToLine">
                                        <i class="bi bi-line"></i> 分享至 LINE
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('script_custom')
        <script>
            const { createApp } = Vue;
            
            createApp({
                data() {
                    return {
                        selectedSystemId: '60甲子籤', // 預設選中的籤詩系統
                        searchQuery: '',              // 搜尋關鍵字過濾
                        activeLot: null,              // 當前點擊放大的籤詩物件
                        modalInstance: null,          // Bootstrap Modal 實例
                        
                        // ===== 靜態模擬系統與所有籤詩清單 (未來可對接 API 後端) =====
                        systems: [
                            { id: '60甲子籤', name: '雷雨師六十甲子籤', total: 4 },
                            { id: '觀音100籤', name: '觀音菩薩一百籤', total: 3 }
                        ],
                        allLots: [
                            // 六十甲子籤資料庫
                            { id: 1, systemId: '60甲子籤', title: '第一籤 甲子', level: '大吉', content: '福如東海壽南山，<br>君爾何須苦中間。<br>榮華富貴天注定，<br>太公釣魚白雲間。' },
                            { id: 2, systemId: '60甲子籤', title: '第二籤 甲寅', level: '上吉', content: '於今此景正當時，<br>看看欲吐百花魁。<br>若能遇得春色好，<br>財寶自然滾滾來。' },
                            { id: 3, systemId: '60甲子籤', title: '第三籤 甲辰', level: '下下', content: '勸君把定心莫愁，<br>前途事事水悠悠。<br>孤舟隨水往來去，<br>多事如今不如休。' },
                            { id: 4, systemId: '60甲子籤', title: '第四籤 甲午', level: '中平', content: '風恬浪靜可行舟，<br>恰是中秋月一輪。<br>凡事不須多憂慮，<br>福祿自有前因來。' },
                            // 觀音一百籤資料庫
                            { id: 5, systemId: '观音100籤', title: '第一籤 東方開泰', level: '大吉', content: '天開地闢結良緣，<br>日吉時良萬事全。<br>若得此籤非小可，<br>前程遠大福綿綿。' },
                            { id: 6, systemId: '觀音100籤', title: '第十二籤 鮑叔進管仲', level: '上上', content: '時吉日良事萬全，<br>百花競發好春風。<br>當行好事在前路，<br>自有貴人提拔中。' },
                            { id: 7, systemId: '觀音100籤', title: '第廿四籤 殷郊遇師', level: '下籤', content: '不成理論事糊塗，<br>內外憂煎百事孤。<br>若遇明人指短路，<br>也須勞碌費工夫。' }
                        ]
                    };
                },
                computed: {
                    // 取得當前系統的名稱
                    currentSystemName() {
                        const sys = this.systems.find(s => s.id === this.selectedSystemId);
                        return sys ? sys.name : '';
                    },
                    // 依據「選定系統」與「搜尋輸入」過濾出的籤詩
                    filteredLots() {
                        return this.allLots.filter(lot => {
                            const matchSystem = lot.systemId === this.selectedSystemId;
                            const matchSearch = lot.title.includes(this.searchQuery) || lot.level.includes(this.searchQuery);
                            return matchSystem && matchSearch;
                        });
                    }
                },
                mounted() {
                    // 初始化 Bootstrap Modal 實例
                    this.modalInstance = new bootstrap.Modal(document.getElementById('fortuneDetailModal'));
                },
                methods: {
                    // 切換籤詩大類
                    selectSystem(id) {
                        this.selectedSystemId = id;
                        this.searchQuery = ''; // 切換時重置搜尋條件
                    },
                    // 開啟詳細彈窗
                    openModal(lot) {
                        this.activeLot = lot;
                        this.modalInstance.show();
                    },
                    // 依據吉凶給予不同顏色的 Bootstrap Badge
                    getBadgeClass(level) {
                        if (!level) return 'bg-secondary';
                        if (level.includes('大吉') || level.includes('上')) return 'bg-danger';
                        if (level.includes('中') || level.includes('平')) return 'bg-warning text-dark';
                        return 'bg-secondary';
                    },
                    // 去除 HTML 標籤（用於卡片摘要預覽）
                    stripHtml(html) {
                        let tmp = document.createElement("DIV");
                        tmp.innerHTML = html;
                        return tmp.textContent || tmp.innerText || "";
                    },
                    // 複製分享連結（SEO 行銷核心）
                    copyShareLink() {
                        // 模擬生成基於籤詩 ID 的 SEO 友善 URL，如：domain.com/fortune/1
                        const shareUrl = `${window.location.origin}/fortune/${this.activeLot.id}`;
                        navigator.clipboard.writeText(shareUrl).then(() => {
                            alert(`已成功複製該籤詩的專屬連結！\n${shareUrl}`);
                        }).catch(err => {
                            console.error('複製失敗', err);
                        });
                    },
                    // 一鍵分享到 LINE
                    shareToLine() {
                        const shareUrl = `${window.location.origin}/fortune/${this.activeLot.id}`;
                        const text = `我在 ChianIn 籤到 查閱了【${this.activeLot.title} (${this.activeLot.level})】，快來看看神明的詳細指引：\n${shareUrl}`;
                        window.open(`https://social-plugins.line.me/lineit/share?text=${encodeURIComponent(text)}`, '_blank');
                    }
                }
            }).mount('#app');
        </script>
@endsection
