<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ストップウォッチ</title>
</head>

<body>
    <form name="myForm">
        <input type="text" size="28" name="stopwatchFormTime">
        <input type="button" value="Start" name="stopwatchFormButton" id="stopwatchButton">
    </form>
    <script src="{{ mix('js/stopwatch.js') }}"></script>

</body>

</html>
