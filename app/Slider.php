<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Slider
 * @package App
 */
class Slider extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sliders';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'link', 'active', 'file'];

    /**
     * @var array $SIZES
     */
    public static $SIZES = [
        ['w' => 100, 'h' => 100, 'type' => 'resize'],
        ['w' => 300, 'h' => 300, 'type' => 'resize'],
        ['w' => 1920, 'h' => 700, 'type' => 'fit'],
    ];

}
