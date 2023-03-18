<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Channels\MailChannel;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('valid_email_domain', function ($attribute, $value, $parameters, $validator) {
            $valid_domains = ['gmail.com', 'hotmail.com', 'outlook.com', 'yahoo.com', 'sudesb.ba.gov.br'];
            $domain = explode('.', $value)[1];
            return in_array($domain, $valid_domains);
        }); 
    }
}
