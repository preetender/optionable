<?php


namespace Plug2Team\Optionable\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Option
 * @property string label
 * @property string action
 * @property string description
 * @property bool default_status
 * @package Plug2Team\Optionable\Models
 */
class Option extends Model
{
    protected $fillable = [
        'label',
        'action',
        'description',
        'default_status'
    ];

    protected $casts = [
        'default_status' => 'boolean'
    ];
}
