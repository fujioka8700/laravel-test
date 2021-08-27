<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StopWatchController extends Controller
{
    public function getIndex()
    {
        return view('stopwatch/index');
    }
}
