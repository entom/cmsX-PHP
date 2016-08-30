<?php

namespace App\Http\Controllers;

use App\ShopBrand;
use App\ShopCategory;
use App\ShopProduct;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class Front
 * @package App\Http\Controllers
 */
class Front extends Controller
{

    /**
     * @var \Illuminate\Database\Eloquent\Collection|static[]
     */
    private $_brands;

    /**
     * @var \Illuminate\Database\Eloquent\Collection|static[]
     */
    private $_categories;

    /**
     * @var \Illuminate\Database\Eloquent\Collection|static[]
     */
    private $_products;

    /**
     * Front constructor.
     */
    public function __construct()
    {
        $this->_brands = ShopBrand::all(['name']);
        $this->_categories = ShopCategory::all(['name']);
        $this->_products = ShopProduct::all(['id', 'name', 'price']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('front.index', [
            'title' => 'Homepage',
            'brands' => $this->_brands,
            'categories' => $this->_categories,
            'products' => $this->_products
        ]);
    }

    public function products()
    {
        return 'products page';
    }

    public function product_details($id)
    {
        return 'product details page';
    }

    public function product_categories()
    {
        return 'product categories page';
    }

    public function product_brands()
    {
        return 'product brands page';
    }

    public function blog()
    {
        return 'blog page';
    }

    public function blog_post($id)
    {
        return 'blog post page';
    }

    public function contact_us()
    {
        return 'contact us page';
    }

    public function login()
    {
        return 'login page';
    }

    public function logout()
    {
        return 'logout page';
    }

    public function cart()
    {
        return 'cart page';
    }

    public function checkout()
    {
        return 'checkout page';
    }

    public function search($query)
    {
        return "$query search page";
    }

}
