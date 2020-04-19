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
    }

    /**
     * @return void
     */
    public function register(): void
    {
        //
    }
}
