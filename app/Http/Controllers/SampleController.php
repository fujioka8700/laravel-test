<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Events\AccessDetection;
use App\Jobs\StoreText;

class SampleController extends Controller
{
    public function events()
    {
        event(new AccessDetection(Str::random(100)));

        return view('sample/events');
    }

    public function queues()
    {
        $text = Str::random(100);

        // ジョブをディスパッチする
        $this->dispatch(new StoreText($text));

        return view('sample/queues');
    }
}
