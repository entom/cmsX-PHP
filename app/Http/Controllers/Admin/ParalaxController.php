<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Paralax;
use App\ImageProcessing;
use Illuminate\Http\Request;
use Session;

/**
 * Class ParalaxController
 * @package App\Http\Controllers\Admin
 */
class ParalaxController extends Controller
{

    /**
     * ParalaxController constructor.
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
        $paralax = Paralax::paginate(25);

        return view('admin.paralax.index', compact('paralax'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.paralax.create');
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
            'codename' => 'required|max:255',
            'file' => 'required'
        ]);

        $requestData = $request->all();

        $image = $request->file('file');
        $fileName = ImageProcessing::transferThumbs($image, 'paralax', Paralax::$SIZES);
        $requestData['file'] = $fileName;
        
        Paralax::create($requestData);

        Session::flash('flash_message', 'Paralax added!');

        return redirect('admin/paralax');
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
        $paralax = Paralax::findOrFail($id);

        return view('admin.paralax.show', compact('paralax'));
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
        $paralax = Paralax::findOrFail($id);

        return view('admin.paralax.edit', compact('paralax'));
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
            'codename' => 'required|max:255',
        ]);

        $requestData = $request->all();

        $paralax = Paralax::findOrFail($id);

        $image = $request->file('file');
        if(!empty($image)) {
            $fileName = ImageProcessing::transferThumbs($image, 'paralax', Paralax::$SIZES, $paralax->file);
            $requestData['file'] = $fileName;
        }

        $paralax->update($requestData);

        Session::flash('flash_message', 'Paralax updated!');

        return redirect('admin/paralax');
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
        Paralax::destroy($id);

        Session::flash('flash_message', 'Paralax deleted!');

        return redirect('admin/paralax');
    }
}
