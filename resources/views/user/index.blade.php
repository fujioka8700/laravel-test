<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー一覧</title>
</head>

<body>
    <h1>ユーザー一覧</h1>
    <ol>
        @foreach ($latestUsers as $user)
            <li>{{ $user->id }} {{ $user->name }}</li>
        @endforeach
    </ol>
</body>

</html>
