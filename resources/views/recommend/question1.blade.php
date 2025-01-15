<x-app-layout>

    <h1>質問 1: 興味のある分野</h1>
    <form method="POST" action="{{ route('recommend.question1') }}">
        @csrf
        <p>興味のある分野を選択してください (複数選択可):</p>
        <label><input type="checkbox" name="answer_1[]" value="環境"> 環境</label><br>
        <label><input type="checkbox" name="answer_1[]" value="教育"> 教育</label><br>
        <label><input type="checkbox" name="answer_1[]" value="福祉"> 福祉</label><br>
        <button type="submit">次へ</button>
    </form>

</x-app-layout>