<?php


namespace Preetender\Optionable\Facades;


use Illuminate\Support\Facades\Facade;
use Preetender\Optionable\Repositories\OptionableRepository;

/**
 * Class Optionable
 * @method static insert(?string $label, string $action, string $description = null)
 * @package Preetender\Optionable\Facades
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
