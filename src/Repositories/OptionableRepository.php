<?php


namespace Plug2Team\Optionable\Repositories;


use Illuminate\Database\Eloquent\Model;
use Plug2Team\Optionable\Models\Option;

class OptionableRepository
{
    protected ?Model $model;

    public function __construct(Option $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        dd($this->resolveCache());
        return $this->model->all();
    }

    /**
     * @return mixed
     */
    private function resolveCache()
    {
        return app('cache')->tags(config('optionable.cache_tag_name'));
    }
}
