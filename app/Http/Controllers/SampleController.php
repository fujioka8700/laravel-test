<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Events\AccessDetection;
use App\Http\Components\FileOperation;
use App\Jobs\GenerateTextFile;
use App\Jobs\StoreText;
use App\Mail\SampleNotification;
use App\Models\User;
use App\Notifications\SimpleNotification;

class SampleController extends Controller
{
    const MAX_LOOP = 3000;

    private $fp;

    public function __construct()
    {
        $this->fp = new FileOperation();
    }

    /**
     * Modelクラスから、メールを送信する
     * @return void
     */
    public function index()
    {
        // ユーザーデータを取得したつもり
        $user = new User([
            'name'  => 'Test User',
            'email' => 'iranai7966@yahoo.co.jp',
        ]);

        // 通知
        $user->notify(new SimpleNotification());
    }

    /**
     * メールを送信する
     * @return void
     */
    public function SampleNotification()
    {
        $name = 'ララベル太郎';
        $text = 'これからもよろしくお願いします。';
        $to   = 'iranai7966@yahoo.co.jp';

        Mail::to($to)->send(new SampleNotification($name, $text));
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
