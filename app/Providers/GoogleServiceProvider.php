<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\SocialMedia\Google;
class GoogleServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Google::class, function($app)
        {
            return new Google(config('services.google'));
        });
    
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
