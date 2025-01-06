<x-app-layout>
    <div class="event-details">
        <!-- イベント情報 -->
        <a href="{{ route('events.search') }}" class="btn-back">← 一覧に戻る</a>
        <h1>{{ $event->title }}</h1>
        <div class="event-image">
            <img src="{{ asset($event->image_path) }}" alt="{{ $event->title }}" width=300>
        </div>
        <p>時間: {{ $event->start_time }} 〜 {{ $event->end_time }}</p>
        <p>場所: {{ $event->place }}</p>
        <p>アクセス: {{ $event->access }}</p>
        <p>報酬: {{ $event->reward }}円/日</p>

        <!-- カレンダー -->
        <h3>日程を選択する</h3>

        <form action="{{ route('event.confirm', ['id' => $event->id]) }}" method="POST">
            @csrf
            <div class="calendar-section">
                <input type="date" name="date" class="form-input" required>
            </div>
            <button type="submit" class="btn-apply">申し込む</button>
        </form>        
    </div>
</x-app-layout>

