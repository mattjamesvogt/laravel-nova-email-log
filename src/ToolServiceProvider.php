<?php

namespace Cloudest\NovaEmailLog;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::resources([
            EmailLogResource::class,
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-email-log');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'nova-email-log');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/nova-email-log'),
        ], 'nova-email-log-lang');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        //
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
