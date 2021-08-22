<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>掲示板のテスト</title>
</head>
<body>
    <h1>掲示板のテスト</h1>
    @foreach ($boards as $board)
        <h3>{{ $board->title }}</h3>
        <p>{{ $board->content }}</p>
    @endforeach
</body>
</html>