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
        <input type="text" size="28" name="myFormTime">
        <input type="button" value="Start" name="myFormButton" onclick="myCheck()">
    </form>
    <script>

        // ストップウォッチの状態。
        Status = {
            'TIMERSTART' : 0,
            'TIMERSTOP'  : 1
        }

        toggleButton = Status.TIMERSTART;

        function myCheck() {
            // 計測開始
            // StartからStopに表示変更
            // 計測停止
            // StopからStartに表示変更
            // 0秒に戻す

            if (toggleButton == Status.TIMERSTART) { // Startボタンを押した
                timerStart = new Date(); // スタート時間を退避
                toggleButton = 1;
                document.myForm.myFormButton.value = "Stop!";
                timerInterval = setInterval("showTime()", 1);
            } else { // Stopボタンを押した
                showTime();
                toggleButton = 0;
                document.myForm.myFormButton.value = "Start";
                clearInterval(timerInterval);
            }
        }

        // 現在の、通算ミリ秒を返す。
        function totalSeconds() {
            progressTime = new Date();
            return progressTime.getTime() - timerStart.getTime();
        }

        // 計測中の"時"を返す。
        function getHour(currentTime) {
            return Math.floor(currentTime / (60 * 60 * 1000));
        }

        // 計測中の"分"を返す。
        function getMinutes(hour) {
            currentTime = currentTime - (hour * 60 * 60 * 1000);
            return Math.floor(currentTime / (60 * 1000));
        }

        // 計測中の"秒"を返す。
        function getSeconds(minutes) {
            currentTime = currentTime - (minutes * 60 * 1000);
            return Math.floor(currentTime / 1000);
        }

        // 計測中の"ミリ秒"を返す。
        function getMillisecond(currentTime) {
            return currentTime % 1000;
        }

        // フォームに計測時間を表示する。
        function showTime() {
            currentTime = totalSeconds();
            hour        = getHour(currentTime);
            minutes     = getMinutes(hour);
            seconds     = getSeconds(minutes);
            millisecond = getMillisecond(currentTime);

            document.myForm.myFormTime.value = hour + ":" + minutes + ":" + seconds + ":" + millisecond;
        }

    </script>
</body>

</html>
