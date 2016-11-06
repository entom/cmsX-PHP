<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'albums';

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
        'title', 'url', 'content', 'active', 'file',
        'meta_title', 'meta_keywords', 'meta_description'
    ];

    /**
     * @var array $SIZES
     */
    public static $SIZES = [
        ['w' => 100, 'h' => 100, 'type' => 'resize'],
        ['w' => 300, 'h' => 300, 'type' => 'resize'],
        ['w' => 800, 'h' => 600, 'type' => 'resize'],
    ];
    
}
