<x-app-layout>

    <h1>質問 3</h1>
    <form method="POST" action="{{ route('recommend.question3') }}">
        @csrf
        <p>既往症や身体の不自由な箇所はありますか？ (自由記述):</p>
        <textarea name="answer_3" rows="5" cols="50" required></textarea><br>
        <button type="submit">送信</button>
    </form>

</x-app-layout>