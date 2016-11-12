<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactMessage
 * @package App
 */
class ContactMessage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_messages';

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
        'title', 'content', 'name', 'email',
        'phone', 'company', 'readed'
    ];

    
}
