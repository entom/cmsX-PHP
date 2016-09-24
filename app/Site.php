<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Site
 * @package App
 */
class Site extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'description', 'content', 'active',
        'created_at_ip', 'updated_at_ip',
        'meta_title', 'meta_keywords', 'meta_description'
    ];

}
