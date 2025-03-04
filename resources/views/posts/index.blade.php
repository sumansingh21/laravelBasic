<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
    <h1> Posts Index Page</h1>
    {{ $name}}  {{ $age }}
    <ul>
        @foreach ($posts as $post)
         <li>{{ $post }}</li>
        @endforeach
        
    </ul>
</body>
</html>