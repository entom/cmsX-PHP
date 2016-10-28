<?php
/**
 * Created by PhpStorm.
 * User: tomasznicieja
 * Date: 22.10.2016
 * Time: 20:34
 */

namespace App\Http\Controllers\Admin;

use App\CalendarEventCategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Session;

use App\CalendarEvent;

class CalendarController extends Controller
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
        return view('admin.calendar.index');
    }

    /**
     * @return mixed
     */
    public function store()
    {

    }

}
