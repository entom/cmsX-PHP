<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Technology
 * @package App\Model
 */
class Technology extends Model
{
    use \Rutorika\Sortable\SortableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'technologies';

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
        'title', 'subtitle', 'content',
        'url', 'position', 'active', 'file',
        'meta_title', 'meta_keywords', 'meta_description'
    ];

    /**
     * @var array $SIZES
     */
    public static $SIZES = [
        ['w' => 100, 'h' => 100, 'type' => 'resize'],
        ['w' => 300, 'h' => 300, 'type' => 'resize'],
        ['w' => 400, 'h' => 400, 'type' => 'fit'],
        ['w' => 800, 'h' => 600, 'type' => 'resize']
    ];

    
}
