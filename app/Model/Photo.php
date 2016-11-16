<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo
 * @package App\Model
 */
class Photo extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photos';

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
    protected $fillable = [
        'title', 'active', 'file', 'album_id', 'model'
    ];

    /**
     * @var array $SIZES
     */
    public static $SIZES = [
        ['w' => 100, 'h' => 100, 'type' => 'resize'],
        ['w' => 300, 'h' => 300, 'type' => 'fit'],
        ['w' => 400, 'h' => 400, 'type' => 'resize'],
        ['w' => 800, 'h' => 600, 'type' => 'resize'],
    ];

}
