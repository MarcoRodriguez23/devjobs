<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

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
        if($this->app->environment('production'))
        {
            URL::forceScheme('https');
        }
        
        VerifyEmail::toMailUsing(function($notifiable,$url){
            return (new MailMessage)
                ->subject('Verify Account')
                ->line('Please click the button below to verify your email address.')
                ->action('Verify Email Address',$url)
                ->line('If you not create an account, no further action is required.');
        });

        
    }
}
