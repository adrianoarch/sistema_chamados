<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Channels\MailChannel;
use Illuminate\Support\Facades\Notification;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
