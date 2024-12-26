{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ホーム画面</title>

        <!-- CSSファイルの読み込み -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>

        <!-- ヘッダー -->
        <div class="header">ロゴ</div>

        <!-- メインコンテンツ -->
        <main>
            {{ $slot }}
        </main>

        <!-- フッターの固定ナビゲーションバー -->
        <div class="footer-nav">
            <a href="#">
                <div class="icon-container">
                    <img src="{{ asset('images/home.jpeg') }}" alt="ホーム" width="24" height="24">
                </div>
                ホーム
            </a>
            <a href="#">
                <div class="icon-container">
                    <img src="{{ asset('images/heart1.jpeg') }}" alt="お気に入り" width="24" height="24">
                </div>
                お気に入り
            </a>
            <a href="#">
                <div class="icon-container">
                    <img src="{{ asset('images/message.jpeg') }}" alt="メッセージ" width="24" height="24">
                </div>
                メッセージ
            </a>
            <a href="#">
                <div class="icon-container">
                    <img src="{{ asset('images/bell.jpeg') }}" alt="お知らせ" width="24" height="24">
                </div>
                お知らせ
            </a>
            <a href="#">
                <div class="icon-container">
                    <img src="{{ asset('images/setting.jpeg') }}" alt="設定" width="24" height="24">
                </div>
                設定
            </a>
        </div>
    </body>
</html>
