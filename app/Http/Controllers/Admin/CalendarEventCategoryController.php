<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\CalendarEventCategory;
use Illuminate\Http\Request;
use Session;

class CalendarEventCategoryController extends Controller
{

    /**
     * CalendarEventCategoryController constructor.
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
        $calendareventcategory = CalendarEventCategory::paginate(25);

        return view('admin.calendar-event-category.index', compact('calendareventcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.calendar-event-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        CalendarEventCategory::create($requestData);

        Session::flash('flash_message', 'CalendarEventCategory added!');

        return redirect('admin/calendar-event-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $calendareventcategory = CalendarEventCategory::findOrFail($id);

        return view('admin.calendar-event-category.show', compact('calendareventcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $calendareventcategory = CalendarEventCategory::findOrFail($id);

        return view('admin.calendar-event-category.edit', compact('calendareventcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $calendareventcategory = CalendarEventCategory::findOrFail($id);
        $calendareventcategory->update($requestData);

        Session::flash('flash_message', 'CalendarEventCategory updated!');

        return redirect('admin/calendar-event-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        CalendarEventCategory::destroy($id);

        Session::flash('flash_message', 'CalendarEventCategory deleted!');

        return redirect('admin/calendar-event-category');
    }
}
