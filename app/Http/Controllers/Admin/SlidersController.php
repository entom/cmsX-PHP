<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Slider;
use Illuminate\Http\Request;
use Session;
use App\Model\ImageProcessing;

/**
 * Class SlidersController
 * @package App\Http\Controllers\Admin
 */
class SlidersController extends Controller
{

    /**
     * SlidersController constructor.
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
        $sliders = Slider::orderBy('position', 'asc')->paginate(25);

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.sliders.create');
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
        $requestData['position'] = Slider::count() + 1;

        $image = $request->file('file');
        if(!empty($image)) {
            $fileName = ImageProcessing::transferThumbs($image, 'sliders', Slider::$SIZES);
            $requestData['file'] = $fileName;
        }

        Slider::create($requestData);

        Session::flash('flash_message', 'Slider added!');

        return redirect('admin/sliders');
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
        $slider = Slider::findOrFail($id);

        return view('admin.sliders.show', compact('slider'));
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
        $slider = Slider::findOrFail($id);

        return view('admin.sliders.edit', compact('slider'));
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
            'title' => 'required|max:255'
        ]);

        $requestData = $request->all();
        
        $slider = Slider::findOrFail($id);

        $image = $request->file('file');
        if(!empty($image)) {
            $fileName = ImageProcessing::transferThumbs($image, 'sliders', Slider::$SIZES, $slider->file);
            $requestData['file'] = $fileName;
        }

        $slider->update($requestData);

        Session::flash('flash_message', 'Slider updated!');

        return redirect('admin/sliders');
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
        Slider::destroy($id);

        Session::flash('flash_message', 'Slider deleted!');

        return redirect('admin/sliders');
    }
}
