<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>「人の役に立ちたい」という願いに寄り添う認知症ケアサービス｜VolunCare</title>

        <!-- Destyle.css をCDNで読み込む -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@latest/destyle.min.css">

        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />" integrity="sha512-xxxxxxxxxxxxxxxxxxx" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- CSSファイルの読み込み -->
        @vite(['resources/css/tailwind.css', 'resources/js/app.js'])
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Flatpickr CSS をCDNで読み込む -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    </head>

    <body>

        <!-- ヘッダー -->
        <div class="header">
            <a href="{{ route('user.home') }}">
                <img src="{{ asset('images/logo1.png') }}" alt="サイトのロゴ" class="logo">
            </a>
        </div>

        <!-- メインコンテンツ -->
        <main>
            {{ $slot }}
        </main>

        <!-- フッターの固定ナビゲーションバー -->
        <div class="footer-nav">
            <a href="{{ route('user.home') }}" class="nav-link">
                <i class="fa-solid fa-house"></i>
                <span class="nav-text">ホーム</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fa-solid fa-heart"></i>
                <span class="nav-text">お気に入り</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fa-solid fa-comment"></i>
                <span class="nav-text">メッセージ</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fa-solid fa-bell"></i>
                <span class="nav-text">お知らせ</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="nav-link">
                <i class="fa-solid fa-gear"></i>
                <span class="nav-text">設定</span>
            </a>
        </div>

        <!-- Flatpickr JS をCDNで読み込む -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
    </body>
</html>
