# Laravel ToDo App

## アプリ概要

Laravelを用いて作成した認証付きToDoアプリです。
ユーザー登録・ログイン機能を実装し、ログインユーザーごとにToDoを管理できるようにしています。

REST APIを利用し、JavaScript(fetch API)による非同期通信でToDoの追加・更新・削除を行っています。

---

# 使用技術

| 技術           | 内容             |
| -------------- | --------- 	　　|
| PHP            | 8系              |
| Laravel        | 12系             |
| MySQL / SQLite | データベース     |
| Laravel Breeze | 認証機能         |
| JavaScript     | fetch API 	    |
| HTML/CSS       | フロント画面     |
| Tailwind CSS   | UIデザイン       |
| Node.js / npm  | フロント環境     |
| Vite           | フロントビルド   |
| Git / GitHub   | バージョン管理   |

---

# 実装機能

## 認証機能

* ユーザー登録
* ログイン
* ログアウト
* セッション管理

---

## ToDo機能

* ToDo一覧表示
* ToDo追加
* ToDo完了チェック
* ToDo削除
* ユーザーごとのToDo管理

---

# API一覧

| メソッド| URL             | 内容         |
| ------  | --------------- | --------     |
| GET     | /api/todos      | ToDo一覧取得 |
| POST    | /api/todos      | ToDo新規作成 |
| PUT     | /api/todos/{id} | ToDo更新     |
| DELETE  | /api/todos/{id} | ToDo削除     |

---

# ディレクトリ構成

```text
app/
 ├ Models/
 │   └ Todo.php
 │
 ├ Http/
 │   └ Controllers/
 │       └ Api/
 │           └ TodoController.php

resources/
 └ views/
     └ dashboard.blade.php

routes/
 └ web.php
```

---

# DB構成

## todosテーブル

| カラム名   | 内容        |
| ---------- | -------     |
| id         | ToDo ID     |
| title      | タイトル    |
| completed  | 完了状態    |
| user_id    | ユーザーID  |
| created_at | 作成日時    |
| updated_at | 更新日時    |

---

# 学習ポイント

このアプリ制作を通して以下を学習しました。

* Laravel MVC構成
* REST API設計
* Eloquent ORM
* migration
* middleware
* CSRF対策
* 認証機能
* fetch APIによる非同期通信
* npm / Vite環境構築
* Git / GitHub運用

---

# 起動方法

## 1. リポジトリ取得

```bash
git clone <repository-url>
```

---

## 2. プロジェクト移動

```bash
cd todo-app
```

---

## 3. Composerインストール

```bash
composer install
```

---

## 4. npmインストール

```bash
npm install
```

---

## 5. .env作成

```bash
cp .env.example .env
```

---

## 6. アプリキー生成

```bash
php artisan key:generate
```

---

## 7. DBマイグレーション

```bash
php artisan migrate
```

---

## 8. Laravel起動

```bash
php artisan serve
```

---

## 9. Vite起動

別ターミナルで実行

```bash
npm run dev
```

---

# 今後追加予定

* ToDo編集機能
* バリデーション強化
* React化
* Docker対応
* AWSデプロイ
* テストコード作成

---

# 制作者

Laravel学習用として作成。
バックエンド実務レベル到達を目標に継続学習中。
