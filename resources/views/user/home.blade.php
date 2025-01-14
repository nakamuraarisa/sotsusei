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