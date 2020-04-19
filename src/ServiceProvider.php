<?php


namespace Plug2Team\Optionable;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * @return void
     */
    public function boot() : void
    {
        // load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../migrations/');

        // register config file
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
