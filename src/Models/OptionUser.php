<?php


namespace Plug2Team\Optionable\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class OptionUser
 * @property bool status
 * @package Plug2Team\Optionable\Models
 */
class OptionUser extends Model
{
    protected $fillable = [
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}
