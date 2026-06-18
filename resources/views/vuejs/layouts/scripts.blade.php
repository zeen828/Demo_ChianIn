        <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.prod.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
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
                    loading: false
                };
            },
            mounted() {
                console.log('Vue 已載入');
                // 頁面開啟先載入籤詩系統
                this.loadSystems();
            },
            methods: {
                /**
                 * 取得籤詩系統
                 */
                async loadSystems() {
                    try {
                        const response = await axios.get('/api/fortune-systems');
                        console.log(response);
                        this.systems = response.data.resource_data;
                        console.log(this.systems);
                    } catch (error) {
                        console.error(error);
                        alert('取得籤詩系統失敗');
                    }
                },
                /**
                 * 抽籤
                 */
                async drawLot() {
                    if (!this.selectedSystem) {
                        alert('請先選擇籤詩系統');
                        return;
                    }
                    this.loading = true;
                    try {
                        const response =
                            await axios.post('/api/draw-lot', {
                                system_id: this.selectedSystem
                            });
                        this.lotResult = response.data.data;
                        console.log(this.lotResult);
                    } catch (error) {
                        console.error(error);
                        alert('抽籤失敗');
                    } finally {
                        this.loading = false;
                    }
                }
            }
        }).mount('#app')
        </script>
        @yield('scripts')

