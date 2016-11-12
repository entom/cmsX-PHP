<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Model\Site;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class SitesController extends Controller
{
    /**
     * SitesController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::paginate(25);

        return view('admin.sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required'
        ], [
            'title.required' => 'Proszę podać tytuł',
            'title.max' => 'Maksymalna długość tytułu to 255 znaków',
            'content.required' => 'Proszę podać treść'
        ]);

        $requestData = $request->all();

        $requestData['url'] = str_slug($requestData['title'], '-');
        $requestData['created_at_ip'] = $request->ip();

        Site::create($requestData);

        Session::flash('flash_message', 'Site added!');

        return redirect('admin/sites');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = Site::findOrFail($id);

        return view('admin.sites.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = Site::findOrFail($id);

        return view('admin.sites.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();

        $site = Site::findOrFail($id);

        $requestData['url'] = str_slug($requestData['title'], '-');
        $requestData['updated_at_ip'] = $request->ip();

        $site->update($requestData);

        Session::flash('flash_message', 'Site updated!');

        return redirect('admin/sites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Site::destroy($id);

        Session::flash('flash_message', 'Site deleted!');

        return redirect('admin/sites');
    }
}
