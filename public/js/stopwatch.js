/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/stopwatch.js":
/*!***********************************!*\
  !*** ./resources/js/stopwatch.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var stopwatchButton = document.getElementById('stopwatchButton');
stopwatchButton.addEventListener('click', function () {
  // ストップウォッチのStartとStopの切り替え。
  stopwatchButton.classList.toggle('active');
  var stopwatch_state = stopwatchButton.classList.contains('active'); // ストップウォッチが開始した時、
  // タイマーをスタートさせ、ボタンを「Stop!」に変更する。

  stopwatchTimerStart(stopwatch_state); // ストップウォッチが停止した時、
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
} // 現在の、通算ミリ秒を返す。


function totalSeconds() {
  progressTime = new Date();
  return progressTime.getTime() - timerStart.getTime();
} // 計測中の"時"を返す。


function getHour(currentTime) {
  return Math.floor(currentTime / (60 * 60 * 1000));
} // 計測中の"分"を返す。


function getMinutes(hour) {
  currentTime = currentTime - hour * 60 * 60 * 1000;
  return Math.floor(currentTime / (60 * 1000));
} // 計測中の"秒"を返す。


function getSeconds(minutes) {
  currentTime = currentTime - minutes * 60 * 1000;
  return Math.floor(currentTime / 1000);
} // 計測中の"ミリ秒"を返す。


function getMillisecond(currentTime) {
  return currentTime % 1000;
} // フォームに計測時間を表示する。


function showTime() {
  currentTime = totalSeconds();
  hour = getHour(currentTime);
  minutes = getMinutes(hour);
  seconds = getSeconds(minutes);
  millisecond = getMillisecond(currentTime);
  document.myForm.stopwatchFormTime.value = hour + ":" + minutes + ":" + seconds + ":" + millisecond;
}

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/stopwatch.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\docker\docker-laravel-main\backend\resources\js\stopwatch.js */"./resources/js/stopwatch.js");


/***/ })

/******/ });