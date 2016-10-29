<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Site;

/**
 * Class SitesContoller
 * @package App\Http\Controllers
 */
class SitesController extends Controller
{

    /**
     * SitesContoller constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {

    }

    public function show($url)
    {
        $site = Site::where('url', '=', $url)->firstOrFail();
        return view('sites.show', compact('site'));
    }

}
