<?php


namespace Plug2Team\Optionable\Repositories;


use Illuminate\Database\Eloquent\Model;

class OptionableRepository
{
    const CACHE_TAG_NAME = "plug2team.optionable";

    protected ?Model $model;

    public function __construct()
    {
    }
}
