@extends('vuejs.layouts.html5')

@section('title', $Title)

@section('content')
@endsection

@section('script_end_custom')
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
            <script>
            const ws = new WebSocket(
                'ws://127.0.0.1:7272/app/rpxfhb01c7vvng8ccpry?protocol=7&client=js&version=8.4.0'
            );
            let pingTimer = null;
            ws.onopen = () => {
                console.log('WebSocket Connected');
                // 訂閱頻道
                ws.send(JSON.stringify({
                    event: 'pusher:subscribe',
                    data: {
                        channel: 'test-channel'
                    }
                }));
                console.log('Subscribe Sent');
                // 每 20 秒送一次 ping
                pingTimer = setInterval(() => {
                    if (ws.readyState === WebSocket.OPEN) {
                        ws.send(JSON.stringify({
                            event: 'pusher:ping'
                        }));
                        console.log('Ping Sent');
                    }
                }, 20000);
            };
            ws.onmessage = (e) => {
                console.log('Received:', e.data);
                let payload;
                try {
                    payload = JSON.parse(e.data);
                } catch {
                    return;
                }
                // Server 主動要求 Ping 時回 Pong
                if (payload.event === 'pusher:ping') {
                    ws.send(JSON.stringify({
                        event: 'pusher:pong'
                    }));
                    console.log('Pong Sent');
                }
            };
            ws.onerror = (e) => {
                console.error('WebSocket Error:', e);
            };
            ws.onclose = (e) => {
                console.log('WebSocket Closed:', e);
                if (pingTimer) {
                    clearInterval(pingTimer);
                }
            };
        </script>
@endsection
