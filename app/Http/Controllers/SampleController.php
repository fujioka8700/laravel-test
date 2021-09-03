<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Events\AccessDetection;
use App\Http\Components\FileOperation;
use App\Jobs\GenerateTextFile;
use App\Jobs\StoreText;

class SampleController extends Controller
{
    const MAX_LOOP = 3000;

    private $fp;

    public function __construct()
    {
        $this->fp = new FileOperation();
    }

    /**
     * キューを使用しない時の、Viewの表示時間
     * @return Illuminate\Contracts\View\View
     */
    public function queuesNone()
    {
        $start = time();

        $file = $this->fp->makeTextFile();

        $this->fp->write($file, self::MAX_LOOP);

        return view('sample/queues', [
            'start' => $start
        ]);
    }

    /**
     * キューを使用する時の、Viewの表示時間
     * @return Illuminate\Contracts\View\View
     */
    public function queuesDatabase()
    {
        $start = time();

        $file = $this->fp->makeTextFile();

        GenerateTextFile::dispatch($file, self::MAX_LOOP);

        return view('sample/queues', [
            'start' => $start
        ]);
    }

    /**
     * イベント＆リスナを使って、テキストファイルを作成する
     * @return Illuminate\Contracts\View\View
     */
    public function events()
    {
        event(new AccessDetection(Str::random(100)));

        return view('sample/events');
    }

    /**
     * キュー投入によるジョブ処理
     * @return Illuminate\Contracts\View\View
     */
    public function queues()
    {
        $text = Str::random(100);

        // ジョブをディスパッチする
        $this->dispatch(new StoreText($text));

        return view('sample/queues');
    }
}
