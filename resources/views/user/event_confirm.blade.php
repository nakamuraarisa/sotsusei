<x-app-layout>
    <div class="event-confirm">
        <h1>こちらの内容で申し込みますか？</h1>
        <p>内容: {{ $event->title }}</p>
        <p>場所: {{ $event->place }}</p>
        <p>日程: {{ \Carbon\Carbon::parse($date)->isoFormat('YYYY年M月D日(ddd)') }}</p>
        <p>時間: {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} 〜 {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}</p>
        <p>報酬: {{ $event->reward }}円/日</p>

        <form action="{{ route('event.complete', ['id' => $event->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="date" value="{{ $date }}">
            <button type="submit" class="btn-confirm">申し込む</button>
        </form>

        <a href="{{ route('event.show', ['id' => $event->id]) }}" class="btn-back">戻る</a>
    </div>
</x-app-layout>
