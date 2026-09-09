# 就職者情報閲覧サイト

Laravel 13 + Alpine.js(バージョン3.15.12) で作成

## 動作環境

- PHP 8.5.9
- composer 2.9.5
- Node.js v22.19.0
- git

## 実行方法

### インストール

任意のフォルダでプロジェクトをクローンし、composerでPHPライブラリを、npmでNode.jsパッケージをインストールする。

```bash
git clone https://github.com/shibamirai/job-finder-laravel13.git
cd job-finder-laravel13
composer install
npm install
```

.env_sampleをコピーして.envを作成する。  

SQLiteを使用する場合は、.envのデータベース接続情報を下記のように修正する。(下記以外のDB_xxxxという項目はすべて削除)

```conf
DB_CONNECTION=sqlite
```

また、databaseフォルダの中に database.sqlite という名前で空のファイルを作成する。

```bash
job-finder
 └─ database
     ├─ factories
     ├─ migrations
     ├─ seeders
     └─ database.sqlite   <-- 新規作成
```

マイグレーション。

```bash
php artisan migrate
```

Laravelアプリを最初に立ち上げるときはアプリケーションキーを作る必要があるため、以下を実行して作成する。

```bash
php artisan key:generate
```

### 管理者ユーザの準備

ログインしないとデータの入力ができないため、シーダーを使って管理者ユーザを作成する。(権限を設定しているわけではないので、厳密には管理者ではなくただの初期ユーザ)  
.envに下記設定を追加すると、シーダーでユーザを作成できるようにしている。

```bash
MANAGER_NAME=名前
MANAGER_EMAIL=メールアドレス
MANAGER_PASSWORD=パスワード
```

このアカウント情報でアプリ起動後に画面右上の```ログイン```からログインできるようになる。

### シーダー実行

シーダーで管理者ユーザとマスターデータの登録を行う。

```bash
php artisan db:seed
```

### 起動

```bash
php artisan serve
```

[http://localhost:8000](http://localhost:8000)で閲覧できる。
