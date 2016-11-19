<?php
/**
 * Created by PhpStorm.
 * User: tomasznicieja
 * Date: 19.11.2016
 * Time: 00:40
 */

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Session;

class PaginationLimitController extends Controller
{
    /**
     * PaginationLimitController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() { }

    /**
     * store method
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        Session::put($requestData['controller'].'Limit', $requestData['limit']);

        return Response::json(array('success' => true));
    }

}
