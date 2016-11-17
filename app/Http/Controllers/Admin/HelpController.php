<?php
/**
 * Created by PhpStorm.
 * User: tomasznicieja
 * Date: 17.11.2016
 * Time: 23:11
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class HelpController
 * @package App\Http\Controllers\Admin
 */
class HelpController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.help.index', []);
    }

}
