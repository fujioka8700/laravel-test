<?php

namespace App\Listeners;

use App\Events\AccessDetection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeTextListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(AccessDetection $event)
    {
        // テキストファイルの作成
        $file = sprintf('%s/%s.txt', storage_path('texts'), date('Ymd-His'));
        touch($file);

        // 書き込み
        $current = file_get_contents($file);
        $current .= $event->param;
        file_put_contents($file, $current);
    }
}
