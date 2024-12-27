<x-app-layout>

    <!-- パンくずリスト -->
    {{-- <div class="breadcrumb">
        <span>ホーム > 検索</span>
    </div> --}}

    <!-- 検索フォーム -->
    <div class="search-section">
        <form action="/search" method="GET" class="search-form">

            <!-- 日付検索 -->
            <div class="form-group">
                <label for="date" class="form-label">
                    日付
                </label>
                <input type="date" id="date" name="date" class="form-input">
            </div>

            <!-- 日付未定チェック -->
            <div class="form-group">
                <input type="checkbox" id="no-date" name="no_date" class="form-checkbox">
                <label for="no-date" class="form-label">日付未定</label>
            </div>

            <!-- 検索ボタン -->
            <button type="submit" class="btn-search">検索する</button>

        </form>
    
    </div>
</x-app-layout>