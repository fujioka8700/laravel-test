const stopwatchButton = document.getElementById('stopwatchButton');

stopwatchButton.addEventListener('click', function () {

    // ストップウォッチのStartとStopの切り替え。
    stopwatchButton.classList.toggle('active');
    var stopwatch_state = stopwatchButton.classList.contains('active');

    // ストップウォッチが開始した時、
    // タイマーをスタートさせ、ボタンを「Stop!」に変更する。
    stopwatchTimerStart(stopwatch_state);

    // ストップウォッチが停止した時、
    // タイマーをストップさせ、ボタンを「Start」に変更する。
    stopwatchTimerStop(stopwatch_state);
});

function stopwatchTimerStart(stopwatch_state) {
    if (stopwatch_state) {
        timerStart = new Date();
        timerInterval = setInterval(showTime, 1);

        stopwatchButtonValueChange('Stop!');
    }
}

function stopwatchTimerStop(stopwatch_state) {
    if (!stopwatch_state) {
        clearInterval(timerInterval);

        stopwatchButtonValueChange('Start');
    }
}

function stopwatchButtonValueChange(button_value) {
    document.myForm.stopwatchFormButton.value = button_value;
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
    hour = getHour(currentTime);
    minutes = getMinutes(hour);
    seconds = getSeconds(minutes);
    millisecond = getMillisecond(currentTime);

    document.myForm.stopwatchFormTime.value = hour + ":" + minutes + ":" + seconds + ":" + millisecond;
}
