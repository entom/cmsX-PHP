<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use App\Model\Offer;
use App\Model\ImageProcessing;

class OfferController extends Controller
{

    /**
     * OfferController constructor.
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
        $offer = Offer::paginate(25);

        return view('admin.offer.index', compact('offer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.offer.create');
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
            'short_content' => 'required',
            'file' => 'required'
        ]);

        $requestData = $request->all();

        $requestData['url'] = str_slug($requestData['title'], '-');
        $requestData['position'] = Offer::count() + 1;
        $image = $request->file('file');
        $fileName = ImageProcessing::transferThumbs($image, 'offers', Offer::$SIZES);
        $requestData['file'] = $fileName;
        
        Offer::create($requestData);

        Session::flash('flash_message', 'Offer added!');

        return redirect('admin/offer');
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
        $offer = Offer::findOrFail($id);

        return view('admin.offer.show', compact('offer'));
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
        $offer = Offer::findOrFail($id);

        return view('admin.offer.edit', compact('offer'));
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
            'content' => 'required',
            'short_content' => 'required'
        ]);

        $requestData = $request->all();
        $offer = Offer::findOrFail($id);

        $requestData['url'] = str_slug($requestData['title'], '-');
        $image = $request->file('file');
        if(!empty($image)) {
            $fileName = ImageProcessing::transferThumbs($image, 'offers', Offer::$SIZES, $offer->file);
            $requestData['file'] = $fileName;
        }

        $offer->update($requestData);

        Session::flash('flash_message', 'Offer updated!');

        return redirect('admin/offer');
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
        Offer::destroy($id);

        Session::flash('flash_message', 'Offer deleted!');

        return redirect('admin/offer');
    }
}
