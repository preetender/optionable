<?php


namespace Preetender\Optionable\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class OptionUser
 * @property bool status
 * @package Preetender\Optionable\Models
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
