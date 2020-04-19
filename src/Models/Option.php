<?php


namespace Plug2Team\Optionable\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Option
 * @property string name
 * @property string slug
 * @property int action
 * @property string description
 * @property bool default_status
 * @package Plug2Team\Optionable\Models
 */
class Option extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'action',
        'description',
        'default_status'
    ];

    protected $casts = [
        'default_status' => 'boolean'
    ];
}
