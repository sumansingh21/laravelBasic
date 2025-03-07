<x-layout>
<h1> Posts Index Page</h1>
    {{ $name}}  {{ $age }}
    <ul>
        @foreach ($posts as $post)
         <li>{{ $post }}</li>
        @endforeach
        
    </ul>
</x-layout>