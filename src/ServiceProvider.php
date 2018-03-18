<?php

namespace Raomingchao\AliyunDirectMail;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->publishes([
          __DIR__ . '/config.php' => config_path('aliyundm.php'),
        ], 'config');
    }

    public function register()
    {

        $this->mergeConfigFrom(__DIR__ . '/config.php', 'aliyundm');

        $this->app->bind(AliyunDirectMail::class, function () {
            return new AliyunDirectMail();
        });
    }

    protected function configPath()
    {
        return __DIR__ . '/config.php';
    }
}