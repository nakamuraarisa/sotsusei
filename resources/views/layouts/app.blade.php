<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>「人の役に立ちたい」という願いに寄り添う認知症ケアサービス｜VolunCare</title>

        <!-- Destyle.css をCDNで読み込む -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@latest/destyle.min.css">

        <!-- CSSファイルの読み込み -->
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
            <a href="#">
                <div class="icon-container">
                    <img src="{{ asset('images/home.jpeg') }}" alt="ホーム" width="24" height="24" class="icon_home"
                    onmouseover="this.src='{{ asset('images/home_yellow.jpeg') }}';"
                    onmouseout="this.src='{{ asset('images/home.jpeg') }}';">
                </div>
                ホーム
            </a>
            <a href="#">
                <div class="icon-container">
                    <img src="{{ asset('images/heart1.jpeg') }}" alt="お気に入り" width="24" height="24" class="icon_heart"
                    onmouseover="this.src='{{ asset('images/heart1_yellow.jpeg') }}';"
                    onmouseout="this.src='{{ asset('images/heart1.jpeg') }}';">
                </div>
                お気に入り
            </a>
            <a href="#">
                <div class="icon-container">
                    <img src="{{ asset('images/message.jpeg') }}" alt="メッセージ" width="24" height="24"  class="icon_message"
                    onmouseover="this.src='{{ asset('images/message_yellow.jpeg') }}';"
                    onmouseout="this.src='{{ asset('images/message.jpeg') }}';">
                </div>
                メッセージ
            </a>
            <a href="#">
                <div class="icon-container">
                    <img src="{{ asset('images/bell.jpeg') }}" alt="お知らせ" width="24" height="24" class="icon_bell"
                    onmouseover="this.src='{{ asset('images/bell_yellow.jpeg') }}';"
                    onmouseout="this.src='{{ asset('images/bell.jpeg') }}';">
                </div>
                お知らせ
            </a>
            <a href="#">
                <div class="icon-container">
                    <img src="{{ asset('images/setting.jpeg') }}" alt="設定" width="24" height="24" class="icon_setting"
                    onmouseover="this.src='{{ asset('images/setting_yellow.jpeg') }}';"
                    onmouseout="this.src='{{ asset('images/setting.jpeg') }}';">
                </div>
                設定
            </a>
        </div>

        <!-- Flatpickr JS をCDNで読み込む -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
    </body>
</html>
