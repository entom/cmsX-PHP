<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShopProduct
 * @package App
 */
class ShopProduct extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = ['name', 'title', 'description','price','category_id','brand_id','created_at_ip', 'updated_at_ip'];

}
