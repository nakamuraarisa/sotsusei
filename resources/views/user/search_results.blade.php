<x-app-layout>
    
    <!-- 検索フォーム -->
    <div class="search-section">
        <h2>日付から探す</h2>
        <form class="search-form" action="{{ route('events.search') }}" method="GET">
            @csrf
            <div class="calendar-wrapper">
                <!-- カレンダーコンテナ -->
                <div id="calendar"></div>
            </div>
            <input type="hidden" id="selected-date" name="date" value="{{ request('date') }}" required>

            <!-- 検索ボタン -->
            <button type="submit" class="btn-search">検索する</button>
        </form>
    </div>

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
                                    <p class="card-description">時間：{{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} 〜 {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}</p>
                                    <p class="card-description">報酬：{{ $event->reward }}円/日</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    @endif

    <!-- カレンダーのスクリプトを追加 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const today = new Date();
            const dayAfterTomorrow = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 2);

            // 検索した日付を取得
            const selectedDate = "{{ request('date') }}";

            flatpickr("#calendar", {
                inline: true,
                minDate: dayAfterTomorrow, // 明後日以降
                defaultDate: selectedDate || null, // 検索した日付を設定
                dateFormat: "Y-m-d",
                locale: "ja",
                onChange: function(selectedDates, dateStr) {
                    document.getElementById('selected-date').value = dateStr;
                }
            });
        });
    </script>

</x-app-layout>

