# [籤到] ChianIn

### AI找名稱
    ChianIn：這是「籤到」最直覺的對應，結合了 Chian (籤) + Check-in (簽到) 的概念。

### 系統
    Laravel 12.x
    Filament 5.x
    Filament Shield 4.x

### Docker操作
```bash
# 進入容器
docker-compose exec workspace bash
# 重啟容器
docker-compose restart nginx
```

### 安裝
```bash
# 套件安裝
composer install
# 複製環境設定
cp .env.example .env
# 將檔案權限在 workspace 容器設定成laradock
cd ..
chown -R laradock:laradock Demo_ChianIn
# 進入容器 workspace 調整目錄權限
cd Demo_ChianIn
chown -R laradock:laradock storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
# 產生應用程式金鑰
php artisan key:generate
# 設定資料庫
vi .env
# 進入容器 workspace 建立資料庫
php artisan migrate
```

#### ENV資料庫設定
```md
APP_LOCALE=zh_TW

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel12
DB_USERNAME=default
DB_PASSWORD=secret
```

### Git拉版本
```bash
git fetch origin main
git checkout -b main origin/main
git checkout main
git reset --hard origin/main
```
