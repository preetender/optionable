<?php


namespace Preetender\Optionable\Repositories;

use Illuminate\Support\Facades\App;
use Preetender\Optionable\Models\Option;

class OptionableRepository
{
    protected ?Option $model;

    /**
     * @param Option $model
     */
    public function __construct(Option $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $label
     * @param string $action
     * @param string|null $description
     * @return mixed
     */
    public function insert(string $label, string $action, string $description = null)
    {
        $option = $this->model->newQuery()->firstOrNew(compact('label'));
        $option->action = $action;
        $option->description = $description;
        $option->default_status = $this->getConfig('optionable.option.default_value');
        $saved = $option->save();

        if($saved) {
            $this->persistItem($option);
        }

        return $saved;
    }

    /**
     * Retrieve all
     *
     * @return mixed
     */
    public function all() : array
    {
        $items = [];

        foreach ($this->getIndexs() as $index) {
            $cache = $this->getCacheName($index);
            $items[] = $this->resolveCache()->get($cache);
        }

        if(!$items) {
            $this->model->all()->each(fn($h) => $this->persistItem($h));
            return $this->all();
        }

        return $items;
    }

    /**
     * @param int $id
     */
    public function addIndex(int $id)
    {
        $index = $this->getIndexs();
        array_push($index, $id);
        $this->resolveCache()->put('index', $index);
    }

    /**
     * @return array
     */
    public function getIndexs(): array
    {
        return  $this->resolveCache()->get("index") ?? [];
    }

    /**
     * @param $item
     * @return void
     */
    public function persistItem($item) : void
    {
        $this->addIndex($item->id);

        // persist option
        $this->resolveCache()->add(
            $this->getCacheName($item->id), 
            $item, 
            $this->getConfig('optionable.cache.ttl')
        );
    }

    /**
     * @param mixed ...$args
     * @return string
     */
    private function getCacheName(...$args)
    {
        return sprintf($this->getConfig('optionable.cache.name'), ...$args);
    }

    /**
     * @return mixed
     */
    private function resolveCache()
    {
        return App::make('cache')->tags($this->getConfig('optionable.cache.tag'));
    }

    /**
     * Get config.
     * 
     * @param string $key 
     * @param mixed $default 
     * @return mixed 
     */
    private function getConfig(string $key, mixed $default = null): mixed
    {
        return App::make('config')->get($key, $default);
    }
}
