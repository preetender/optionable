<?php


namespace Preetender\Optionable;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * @return void
     */
    public function boot() : void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations/');

        $this->mergeConfigFrom(__DIR__ . '/../config/optionable.php', 'optionable');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        //
    }
}
