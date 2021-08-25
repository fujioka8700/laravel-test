<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeCounterController extends Controller
{
    public function getIndex()
    {
        return view('timecounter/index');
    }
}
