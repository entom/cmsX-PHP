<?php

namespace App;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShopCategory
 * @package App
 */
class ShopCategory extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at_ip', 'updated_at_ip'];

}
