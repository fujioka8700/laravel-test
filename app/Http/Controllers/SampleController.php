<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\AccessDetection;
use Illuminate\Support\Str;

class SampleController extends Controller
{
    public function events()
    {
        event(new AccessDetection(Str::random(100)));

        return view('sample/events');
    }
}
