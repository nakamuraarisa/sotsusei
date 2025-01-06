<x-app-layout>
    <div class="event-details">
        <h1>{{ $event->title }}</h1>
        <div class="event-image">
            <img src="{{ asset($event->image_path) }}" alt="{{ $event->title }}" width=300>
        </div>
        <p>場所: {{ $event->place }}</p>
        <p>時間: {{ $event->start_time }} 〜 {{ $event->end_time }}</p>
        <p>報酬: {{ $event->reward }}円/日</p>
        <p>詳細: {{ $event->description }}</p>
        <!-- 戻るボタン -->
        <a href="{{ request()->get('back_url', route('events.search')) }}" class="btn-back">戻る</a>
    </div>
</x-app-layout>
