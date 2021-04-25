<?php

namespace Jiminny\Providers;

use Illuminate\Support\ServiceProvider;
use Jiminny\Solution\CustomerAudio\CustomerAudioService;
use Jiminny\Solution\SampleAudio\SampleAudioService;
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
        $this->app->singleton(UserAudioService::class, static fn() => new UserAudioService(
            new SampleAudioService(),
        ));
        $this->app->singleton(CustomerAudioService::class, static fn() => new CustomerAudioService(
            new SampleAudioService(),
        ));
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
