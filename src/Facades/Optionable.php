<?php


namespace Plug2Team\Optionable\Facades;


use Illuminate\Support\Facades\Facade;
use Plug2Team\Optionable\Repositories\OptionableRepository;

/**
 * Class Optionable
 * @method static insert(?string $label, string $action, ?string $description = null)
 * @package Plug2Team\Optionable\Facades
 */
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
