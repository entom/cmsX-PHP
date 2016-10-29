<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Logo;
use App\ImageProcessing;
use Illuminate\Http\Request;
use Session;

class LogosController extends Controller
{

    /**
     * LogosController constructor.
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
        $logos = Logo::orderBy('position', 'asc')->paginate(25);

        return view('admin.logos.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.logos.create');
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
        $requestData['position'] = Logo::count() + 1;

        $image = $request->file('file');
        $fileName = ImageProcessing::transferThumbs($image, 'logos', Logo::$SIZES);
        $requestData['file'] = $fileName;
        
        Logo::create($requestData);

        Session::flash('flash_message', 'Logo added!');

        return redirect('admin/logos');
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
        $logo = Logo::findOrFail($id);

        return view('admin.logos.show', compact('logo'));
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
        $logo = Logo::findOrFail($id);

        return view('admin.logos.edit', compact('logo'));
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
        $this->validate($request, [
            'title' => 'required|max:255',
            'file' => 'required'
        ]);

        $requestData = $request->all();

        $logo = Logo::findOrFail($id);

        $image = $request->file('file');
        $fileName = ImageProcessing::transferThumbs($image, 'logos', Logo::$SIZES, $logo->file);
        $requestData['file'] = $fileName;

        $logo->update($requestData);

        Session::flash('flash_message', 'Logo updated!');

        return redirect('admin/logos');
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
        Logo::destroy($id);

        $logos = Logo::sorted()->get();
        $position = 0;
        foreach ($logos as $logo) {
            $position++;
            $logo->position = $position;
            $logo->save();
        }

        Session::flash('flash_message', 'Logo deleted!');

        return redirect('admin/logos');
    }
}
