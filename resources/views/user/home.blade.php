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
            <input type="hidden" id="selected-date" name="date" required>

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
                    <p>{{ \Carbon\Carbon::parse($reservation->eventDate->date)->isoFormat('YYYY年M月D日(ddd)') }} 
                        {{ \Carbon\Carbon::parse($reservation->eventDate->event->start_time)->format('H:i') }}〜{{ \Carbon\Carbon::parse($reservation->eventDate->event->end_time)->format('H:i') }}
                        </p>
                    <p>{{ $reservation->eventDate->event->title }}</＿p>
                    <p>場所：{{ $reservation->eventDate->event->place }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>現在の予約はありません。</p>
    @endif

    <!-- カレンダーのスクリプトを追加 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const today = new Date();
            const dayAfterTomorrow = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 2);

            flatpickr("#calendar", {
                inline: true,
                minDate: dayAfterTomorrow, // 明後日以降
                dateFormat: "Y-m-d",
                locale: "ja",
                onChange: function(selectedDates, dateStr) {
                    document.getElementById('selected-date').value = dateStr;
                }
            });
        });
    </script>

</x-app-layout>