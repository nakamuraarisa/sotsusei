<x-app-layout>

    <h1>質問 2</h1>
    <form method="POST" action="{{ route('recommend.question2') }}">
        @csrf
        <p>過去に長年やってきたことは何ですか？ (自由記述):</p>
        <textarea name="answer_2" rows="5" cols="50" required></textarea><br>
        <button type="submit">次へ</button>
    </form>

</x-app-layout>