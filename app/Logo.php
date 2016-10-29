<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{

    use \Rutorika\Sortable\SortableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'logos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    protected static $sortableField = 'position';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'link', 'active', 'file'
    ];

    /**
     * @var array $SIZES
     */
    public static $SIZES = [
        ['w' => 100, 'h' => 100, 'type' => 'resize'],
        ['w' => 300, 'h' => 300, 'type' => 'resize']
    ];
    
}
