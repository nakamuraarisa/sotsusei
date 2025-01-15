<x-app-layout>
    
    <div class="event-details">
        <!-- イベント情報 -->
        <a href="{{ route('events.search') }}" class="btn-back">← 一覧に戻る</a>
        <h1 class="event-title">{{ $event->title }}</h1>
        <div class="event-image">
            <img src="{{ asset($event->image_path) }}" alt="{{ $event->title }}" width=300>
        </div>
        <p>時間: {{ $event->start_time }} 〜 {{ $event->end_time }}</p>
        <p>場所: {{ $event->place }}</p>
        <p>報酬: {{ $event->reward }}円/日</p>

        <!-- カレンダー -->
        <h3 class="calendar-title">日程を選択する</h3>

        <form action="{{ route('event.confirm', ['id' => $event->id]) }}" method="POST">
            @csrf
            <div class="calendar-wrapper">
                <!-- カレンダーコンテナ -->
                <div id="calendar"></div>
            </div>
            <input type="hidden" id="selected-date" name="date" required>
            <div class="button-wrapper">
                <button type="submit" class="btn-apply">申し込む</button>
            </div>
        </form>
    </div>

    <!-- カレンダーのスクリプトを追加 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // サーバーから渡された選択可能な日付
            const availableDates = @json($availableDates);

            // Flatpickr を初期化
            flatpickr("#calendar", {
                inline: true,         // カレンダーを直接表示
                enable: availableDates, // 選択可能な日付を指定
                dateFormat: "Y-m-d",   // 日付フォーマット
                locale: "ja",          // 日本語対応
                
                onChange: function(selectedDates, dateStr) {
                    // 選択された日付をhiddenフィールドに設定
                    document.getElementById('selected-date').value = dateStr;
                }
            });
        });
    </script>
</x-app-layout>
