<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use App\Model\Technology;
use App\Model\ImageProcessing;

/**
 * Class TechnologyController
 * @package App\Http\Controllers\Admin
 */
class TechnologyController extends Controller
{

    /**
     * TechnologyController constructor.
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
        $technology = Technology::orderBy('position', 'asc')->paginate(25);

        return view('admin.technology.index', compact('technology'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.technology.create');
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
        $this->validate($request, [
            'title' => 'required|max:255',
            'file' => 'required'
        ]);

        $requestData = $request->all();

        $requestData['position'] = Technology::count() + 1;
        $requestData['url'] = str_slug($requestData['title'], '-');

        $image = $request->file('file');
        $fileName = ImageProcessing::transferThumbs($image, 'technologies', Technology::$SIZES);
        $requestData['file'] = $fileName;

        Technology::create($requestData);

        Session::flash('flash_message', 'Technology added!');

        return redirect('admin/technology');
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
        $technology = Technology::findOrFail($id);

        return view('admin.technology.show', compact('technology'));
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
        $technology = Technology::findOrFail($id);

        return view('admin.technology.edit', compact('technology'));
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
        
        $technology = Technology::findOrFail($id);

        $requestData['url'] = str_slug($requestData['title'], '-');

        $image = $request->file('file');
        if(!empty($image)) {
            $fileName = ImageProcessing::transferThumbs($image, 'technologies', Technology::$SIZES, $technology->file);
            $requestData['file'] = $fileName;
        }

        $technology->update($requestData);

        Session::flash('flash_message', 'Technology updated!');

        return redirect('admin/technology');
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
        Technology::destroy($id);

        Session::flash('flash_message', 'Technology deleted!');

        return redirect('admin/technology');
    }
}
