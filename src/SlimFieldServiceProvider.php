<?php

namespace ExpDev07\NovaSlimField;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class SlimFieldServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishable assets.
        $this->publishes([
            __DIR__ . '/../config/nova-slim-field.php' => config_path('nova-slim-field.php'),
        ], 'config');

        Nova::serving(function (ServingNova $event) {
            // JQuery?
            Nova::script('jquery', config('nova-slim-field.slim.jquery'));

            // Slim.
            Nova::script('nova-slim-field-lib', config('nova-slim-field.slim.js'));
            Nova::style('nova-slim-field-lib', config('nova-slim-field.slim.css'));

            // Field.
            Nova::script('nova-slim-field-main', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-slim-field-main', __DIR__.'/../dist/css/field.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/nova-slim-field.php', 'nova-slim-field');
    }

}
