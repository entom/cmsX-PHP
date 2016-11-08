<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Realization;
use Illuminate\Http\Request;
use Session;

class RealizationsController extends Controller
{

    /**
     * RealizationsController constructor.
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
        $realizations = Realization::paginate(25);

        return view('admin.realizations.index', compact('realizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.realizations.create');
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
        
        Realization::create($requestData);

        Session::flash('flash_message', 'Realization added!');

        return redirect('admin/realizations');
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
        $realization = Realization::findOrFail($id);

        return view('admin.realizations.show', compact('realization'));
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
        $realization = Realization::findOrFail($id);

        return view('admin.realizations.edit', compact('realization'));
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
        
        $realization = Realization::findOrFail($id);
        $realization->update($requestData);

        Session::flash('flash_message', 'Realization updated!');

        return redirect('admin/realizations');
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
        Realization::destroy($id);

        Session::flash('flash_message', 'Realization deleted!');

        return redirect('admin/realizations');
    }
}
