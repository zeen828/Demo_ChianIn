        <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.prod.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        const { createApp } = Vue
        createApp({
            data() {
                return {
                    message: 'Laravel 12 + Vue 3',
                    count: 0
                }
            }
        }).mount('#app')
        </script>
        @yield('scripts')

