<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ストップウォッチ</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body>
    <h1>ストップウォッチ</h1>
    <form name="myForm">
        <input type="text" size="28" name="stopwatchFormTime" placeholder="0:0:0:0">
        <input type="button" value="Start" name="stopwatchFormButton" id="stopwatchButton">
    </form>
    <script src="{{ mix('js/stopwatch.js') }}"></script>
</body>

</html>
