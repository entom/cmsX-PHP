<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use \Rutorika\Sortable\SortableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offers';

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
        'title', 'content', 'short_content', 'url',
        'active', 'position', 'file', 'meta_title',
        'meta_keywords', 'meta_description'
    ];

    public static $SIZES = [
        ['w' => 100, 'h' => 100, 'type' => 'resize'],
        ['w' => 300, 'h' => 300, 'type' => 'resize'],
        ['w' => 800, 'h' => 600, 'type' => 'resize'],
        ['w' => 412, 'h' => 274, 'type' => 'fit'],
    ];

    
}
