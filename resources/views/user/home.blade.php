<x-app-layout>

    <!-- 検索フォーム -->
    <div class="search-section">
        <form class="search-form" action="{{ route('events.search') }}" method="GET">

            <!-- 日付検索 -->
            <div class="form-group">
                <label for="date" class="form-label">
                    日付
                </label>
                <input type="date" name="date" class="form-input" value="{{ request('search') }}">
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

    <!-- 検索結果表示 -->
    <div class="results-section">
        <h3>検索結果</h3>

        @if($events->isEmpty())
            <p>指定された日程に開催されるイベントはありません。</p>
        @else
            <ul>
                @foreach ($events as $event)
                    <li>
                        <img src="{{ $event->image_path }}" alt="写真" width=300>
                        <h3>{{ $event->title }}</h3>
                        <p>場所： {{ $event->place }}</p>
                        <p>時間： {{ $event->start_time }}〜{{ $event->end_time }}</p>
                        <p>報酬： {{ $event->reward }}円/日</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

</x-app-layout>