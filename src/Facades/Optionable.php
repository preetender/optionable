<?php


namespace Plug2Team\Optionable\Facades;


use Illuminate\Support\Facades\Facade;
use Plug2Team\Optionable\Repositories\OptionableRepository;

class Optionable extends Facade
{
    /**
     * @return string|void
     */
    protected static function getFacadeAccessor()
    {
        return OptionableRepository::class;
    }
}
