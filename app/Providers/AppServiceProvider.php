<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Dice;
use App\LoadedDice;
use App\RollableDice;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RollableDice::class, function ($app) {
            // \Debugbar::info('インジェクションする際、ロジックの変更が可能。');
            if (App::environment('testing')) {
                return new LoadedDice();
            }
            return new Dice();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
