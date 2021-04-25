<?php

namespace Jiminny\Providers;

use Illuminate\Support\ServiceProvider;
use Jiminny\Solution\UserAudio\UserAudioService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserAudioService::class, static fn() => new UserAudioService());
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
