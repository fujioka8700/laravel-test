<?php

namespace App\Providers;

use App\Events\AccessDetection;
use App\Listeners\MakeTextListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // アクセス時にイベントを発行する側
        'App\Events\AccessDetection' => [
            // テキストを生成&書き込みを行うリスナー側
            'App\Listeners\MakeTextListener',
        ],
        // AccessDetection::class => [
        //     MakeTextListener::class,
        // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
