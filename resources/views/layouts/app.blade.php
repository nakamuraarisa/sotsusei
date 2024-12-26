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
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
                </svg>
                ホーム
            </a>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                </svg>
                お気に入り
            </a>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="M21 8V7l-3 2-2-1-5 4-5-4-2 1-3-2v1l3 2v7h14V10l3-2z" />
                </svg>
                メッセージ
            </a>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
                </svg>
                お知らせ
            </a>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-4 0-7.58 1.79-9.5 4.5-.18.28-.5.5-.5.5h20s-.32-.22-.5-.5C19.58 15.79 16 14 12 14z" />
                </svg>
                設定
            </a>
        </div>
    </body>
</html>
