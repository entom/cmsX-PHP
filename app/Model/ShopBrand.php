<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShopBrand
 * @package App
 */
class ShopBrand extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at_ip', 'updated_at_ip'];

}
