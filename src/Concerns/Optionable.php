<?php


namespace Plug2Team\Concerns;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Plug2Team\Optionable\Models\Option;

trait Optionable
{
    /**
     * Get options by user
     *
     * @return BelongsToMany
     */
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class )->withPivot(['id','status']);
    }

    /**
     * Verify status of option by name.
     *
     * @param $name
     * @return bool
     */
    public function hasOptionName($name) : bool
    {
        return $this->readOptionExpression(['name', '=', $name]);
    }

    /**
     * @param array $expression
     * @return bool
     */
    protected function readOptionExpression($expression = [])
    {
        if( $expression[0] === 'id'):
            $options = $this->options()->wherePivot($expression[0], $expression[1], $expression[2])->first();
        else:
            $options = $this->options()->where($expression[0], $expression[1], $expression[2])->first();
        endif;

        return $options->pivot->status;
    }

    /**
     * Sincronizar opções do usuario
     * @param array $codes
     */
    public function syncOptions($codes = [])
    {
        //Options::syncUserAndOptions($this, $codes);
    }

    /**
     * Adicionar nova opção para usuario
     * @param Option $option
     */
    public function attachOptions(Option $option)
    {
        //Options::attachUserOptions($this, $option);
    }

    /**
     * Remover opções do usuario
     * @param Option $option
     */
    public function detachOptions(Option $option)
    {
        //Options::detachUserOptions($this, $option);
    }
}
