<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use App\Blog;
use App\ImageProcessing;

class BlogsController extends Controller
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
        $blogs = Blog::paginate(25);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.blogs.create');
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
            'active' => 'required'
        ]);

        $requestData = $request->all();

        $requestData['url'] = str_slug($requestData['title'], '-');

        $image = $request->file('file');
        if(!empty($image)) {
            $fileName = ImageProcessing::transferThumbs($image, 'blogs', Blog::$SIZES);
            $requestData['file'] = $fileName;
        }

        Blog::create($requestData);

        Session::flash('flash_message', 'Blog added!');

        return redirect('admin/blogs');
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
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.show', compact('blog'));
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
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.edit', compact('blog'));
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
        
        $blog = Blog::findOrFail($id);

        $requestData['url'] = str_slug($requestData['title'], '-');

        $image = $request->file('file');
        if(!empty($image)) {
            $fileName = ImageProcessing::transferThumbs($image, 'blogs', Blog::$SIZES, $blog->file);
            $requestData['file'] = $fileName;
        }

        $blog->update($requestData);

        Session::flash('flash_message', 'Blog updated!');

        return redirect('admin/blogs');
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
        Blog::destroy($id);

        Session::flash('flash_message', 'Blog deleted!');

        return redirect('admin/blogs');
    }
}
