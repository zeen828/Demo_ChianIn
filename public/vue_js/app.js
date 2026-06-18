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
                this.lotResult = response.data.data;;
            }
            finally {
                this.loading = false;
            }
        }
    }
}).mount('#app');