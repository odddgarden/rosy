<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{ $user->first_name }}</h1>
    @foreach ($files as $file)
        <li>
            <a href="{{ route('files.show', $file->id) }}">{{$file->title}}</a>
            <p>{{ $file->synopsis }}</p>
        </li>
    @endforeach

    <div class="uploadFile">
        <a href="../files/create">Upload Screenplay</a>
    </div>
</body>
</html>