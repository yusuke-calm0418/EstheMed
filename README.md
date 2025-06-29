# EstheMed - Laravel 10 App with Sail & Vite

このプロジェクトは、Laravel Sail（Docker）を使って構築されたエステ顧客管理アプリケーションです。  
開発環境として Vite（フロントエンドビルド）を導入しています。

---

## 🚀 起動方法

このプロジェクトは **Laravel Sail** を使用しているため、Docker 上で起動できます。

### 1. 環境準備（初回のみ）
cp .env.example .env
sail up -d
sail artisan migrate

### 2. ビルド
sail npm install
sail npm run dev

### 3. テストユーザー
テストユーザー
test@example.com
password



