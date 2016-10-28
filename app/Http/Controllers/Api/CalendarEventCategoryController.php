<?php
/**
 * Created by PhpStorm.
 * User: tomasznicieja
 * Date: 25.10.2016
 * Time: 00:40
 */

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Session;

use App\CalendarEventCategory;

class CalendarEventCategoryController extends Controller
{
    /**
     * BlogsController constructor.
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
    public function index()
    {
        $events = CalendarEventCategory::all();
        return Response::json(array('event_categories' => $events));
    }

    /**
     * store method
     * @return mixed
     */
    public function store()
    {
        CalendarEventCategory::create(array(
            'title' => Input::get('title'),
            'color' => Input::get('color')
        ));

        return Response::json(array('success' => true));
    }

}
