<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Realization
 * @package App\Model
 */
class Realization extends BaseModel
{
    use \Rutorika\Sortable\SortableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'realizations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * @var string $sortableField
     */
    protected static $sortableField = 'position';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'file', 'active', 'file', 'position',
        'url', 'meta_title', 'meta_keywords', 'meta_description'
    ];

    /**
     * @var array $SIZES
     */
    public static $SIZES = [
        ['w' => 100, 'h' => 100, 'type' => 'resize'],
        ['w' => 300, 'h' => 300, 'type' => 'resize'],
        ['w' => 416, 'h' => 277, 'type' => 'fit'],
        ['w' => 800, 'h' => 600, 'type' => 'resize'],
    ];
    
}
