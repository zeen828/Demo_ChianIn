        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
        <style>
body {
    /* 設定圖片路徑 */
    background-image: url('/images/website/bg-1.png');
    
    /* 核心 RWD 設定 */
    background-size: cover;        /* 強制圖片覆蓋整個容器，自動縮放以保持比例 */
    background-position: center;   /* 圖片保持居中 */
    background-repeat: no-repeat;  /* 防止圖片重複平鋪 */
    background-attachment: fixed;  /* 固定背景，讓內容捲動時背景更有深度感 */
    
    /* 效能最佳化：設定一個與圖片主色調相近的背景色，防止圖片載入時出現白邊 */
    background-color: #fdf6e3;
    
    /* 確保 body 最小高度為視窗高度 */
    min-height: 100vh;
    margin: 0;
}

/* 讓你的主要容器稍微透明，透出背後的龍紋 */
.container, 
header, 
footer {
    background-color: rgba(255, 255, 255, 0.7); /* 半透明白色底 */
    backdrop-filter: blur(5px);                 /* 增加一點模糊效果，質感倍增 */
    border-radius: 8px;
}

/* 針對行動裝置微調 */
@media (max-width: 768px) {
    body {
        /* 手機版可能需要將背景改為 scroll，避免 fixed 造成的效能卡頓 */
        background-attachment: scroll;
    }
}

        /* 自訂宮廟主題配色 */
        .navbar-chianin {
        /* 深木紋底色或深暗紅 */
        background-color: #4a1e1e !important; 
        border-bottom: 3px solid #b22222; /* 底部使用硃砂紅線條作為點綴 */
        color: #fdf6e3 !important; /* 淺米色字體 */
        padding: 1rem 0;
        }

        /* 確保導覽列內的文字連結顏色為淺米色 */
        .navbar-chianin .navbar-brand,
        .navbar-chianin .nav-link {
        color: #fdf6e3 !important;
        transition: 0.3s;
        }

        .navbar-chianin .nav-link:hover {
        color: #ffd700 !important; /* 滑鼠移入時呈現金色，增加質感 */
        }

        /* 處理 Dropdown 選單顏色 */
        .navbar-chianin .dropdown-menu {
        background-color: #fdf6e3; /* 下拉選單改為米色底 */
        border: none;
        }

        .navbar-chianin .dropdown-item {
        color: #4a1e1e !important;
        }

        .navbar-chianin .dropdown-item:hover {
        background-color: #d8c9a6;
        }

        /* 修改 Search 按鈕顏色 */
        .navbar-chianin .btn-outline-success {
        border-color: #ffd700;
        color: #ffd700;
        }

        .navbar-chianin .btn-outline-success:hover {
        background-color: #ffd700;
        color: #4a1e1e;
        }

        /* Footer 自訂配色 */
        .footer-chianin {
        background-color: #2e0d0d !important; /* 深暗紅色，呼應宮廟視覺 */
        color: #d1c4a9 !important; /* 米白色系文字 */
        border-top: 4px solid #b22222 !important; /* 頂部紅色邊線增加結構感 */
        }

/* Logo 文字顏色：調整為淺米色，更具質感 */
.navbar-chianin .navbar-brand {
    color: #fdf6e3 !important; 
    font-weight: bold;
}

/* 搜尋按鈕顏色：金色邊框與文字 */
.navbar-chianin .btn-outline-success {
    border-color: #ffd700 !important;
    color: #ffd700 !important;
}

/* 搜尋按鈕懸停效果 */
.navbar-chianin .btn-outline-success:hover {
    background-color: #ffd700 !important;
    color: #4a1e1e !important;
}


        /* 確保文字色彩統一 */
        .footer-chianin .text-light-gray {
        color: #d1c4a9 !important;
        opacity: 0.8;
        }

        /* 連結 hover 效果 */
        .footer-chianin a:hover {
        color: #ffd700 !important; /* 滑鼠移入變金色 */
        text-decoration: underline !important;
        }

        /* 調整分隔線顏色 */
        .footer-chianin hr {
        border-color: #5a3e3e !important;
        }

/* Footer 內容文字顏色 */
.footer-chianin {
    color: #d1c4a9 !important; /* 全局 Footer 文字色彩 */
}

/* 確保品牌名稱、連結標題顯示為較亮的米色 */
.footer-chianin h5, 
.footer-chianin h6 {
    color: #fdf6e3 !important;
}

/* 連結與內文顏色 */
.footer-chianin a, 
.footer-chianin p {
    color: #d1c4a9 !important;
}

/* 連結懸停效果：金色 */
.footer-chianin a:hover {
    color: #ffd700 !important;
}
        </style>
@section('style_custom')
        <style>
        </style>
@show
