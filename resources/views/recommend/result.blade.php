<x-app-layout>

    <h1>おすすめのボランティア活動</h1>
    <p>以下の活動がおすすめです:</p>
    <ul>
        @foreach ($recommendations as $recommendation)
            <li>{{ $recommendation }}</li>
        @endforeach
    </ul>
    
</x-app-layout>
