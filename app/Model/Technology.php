<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Technology
 * @package App\Model
 */
class Technology extends Model
{
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
        'title', 'subtitle', 'content', 'url', 'position', 'active'
    ];

    
}
