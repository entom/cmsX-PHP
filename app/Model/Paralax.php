<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paralax
 * @package App
 */
class Paralax extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paralaxes';

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
    protected $fillable = ['title', 'codename', 'file'];

    /**
     * @var array $SIZES
     */
    public static $SIZES = [
        ['w' => 100, 'h' => 100, 'type' => 'resize'],
        ['w' => 300, 'h' => 300, 'type' => 'resize'],
        ['w' => 1920, 'h' => 700, 'type' => 'fit'],
    ];

    /**
     * getByCodename method
     *
     * @param $codename
     * @return mixed|Paralax
     */
    public static function getByCodename($codename)
    {
        return self::where('codename', '=', $codename)->firstOrFail();
    }

}
