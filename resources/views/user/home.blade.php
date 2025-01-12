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

            {{-- <!-- 日付未定チェック -->
            <div class="form-group">
                <input type="checkbox" id="no-date" name="no_date" class="form-checkbox">
                <label for="no-date" class="form-label">日付未定</label>
            </div> --}}

            <!-- 検索ボタン -->
            <button type="submit" class="btn-search">検索する</button>

        </form>
    </div>

    {{-- <!-- 検索結果表示 -->
    @if(isset($hasSearched) && $hasSearched)
        <div class="results-section">
            <h3>検索結果</h3>

            @if($events->isEmpty())
                <p>指定された日程に開催されるイベントはありません。</p>
            @else
                <div class="card-container">
                    @foreach ($events as $event)
                        <a href="{{ route('event.show', ['id' => $event->id, 'back_url' => request()->fullUrl()]) }}" class="card-link">
                            <div class="card">
                                <div class="card-image">
                                    <img src="{{ asset($event->image_path) }}" alt="写真" width=300>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">{{ $event->title }}</h3>
                                    <p class="card-description">場所：{{ $event->place }}</p>
                                    <p class="card-description">時間：{{ $event->start_time }}〜{{ $event->end_time }}</p>
                                    <p class="card-description">報酬：{{ $event->reward }}円/日</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    @endif --}}

    <!-- 現在の予約表示 -->
    @if(isset($currentReservations) && !$currentReservations->isEmpty())
        <div class="reservation-section">
            <h2>現在の予約</h2>
            @foreach ($currentReservations as $reservation)
                <div class="reservation-card">
                    <p>{{ $reservation->eventDate->date }} {{ $reservation->eventDate->event->start_time }}〜{{ $reservation->eventDate->event->end_time }}</p>
                    <p>{{ $reservation->eventDate->event->title }}</＿p>
                    <p>場所：{{ $reservation->eventDate->event->place }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>現在の予約はありません。</p>
    @endif

</x-app-layout>