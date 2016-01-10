<?php

namespace Toilets\Providers;

use Illuminate\Support\ServiceProvider;
use Toilets\Models\Message;
use Toilets\Models\Observers\MessageObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Message::observe(app(MessageObserver::class));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
