<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use App\Model\Realization;
use App\Model\ImageProcessing;

/**
 * Class RealizationsController
 * @package App\Http\Controllers\Admin
 */
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
        $realizations = Realization::orderBy('position', 'asc')->paginate(25);

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
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'file' => 'required'
        ]);

        $requestData = $request->all();

        $requestData['position'] = Realization::count() + 1;
        $requestData['url'] = str_slug($requestData['title'], '-');

        $image = $request->file('file');
        $fileName = ImageProcessing::transferThumbs($image, 'realizations', Realization::$SIZES);
        $requestData['file'] = $fileName;
        
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

        $requestData['url'] = str_slug($requestData['title'], '-');

        $image = $request->file('file');
        if(!empty($image)) {
            $fileName = ImageProcessing::transferThumbs($image, 'realizations', Realization::$SIZES, $realization->file);
            $requestData['file'] = $fileName;
        }

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
