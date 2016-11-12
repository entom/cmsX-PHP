<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use App\Model\ContactMessage;

/**
 * Class ContactMessageController
 * @package App\Http\Controllers\Admin
 */
class ContactMessageController extends Controller
{

    /**
     * ContactMessageController constructor.
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
        $contactmessage = ContactMessage::orderBy('readed', 'asc')->orderBy('id', 'desc')->paginate(25);

        return view('admin.contact-message.index', compact('contactmessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.contact-message.create');
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

        ContactMessage::create($requestData);

        Session::flash('flash_message', 'ContactMessage added!');

        return redirect('admin/contact-message');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $contactmessage = ContactMessage::findOrFail($id);

        return view('admin.contact-message.show', compact('contactmessage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $contactmessage = ContactMessage::findOrFail($id);

        return view('admin.contact-message.edit', compact('contactmessage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

        $requestData = $request->all();

        $contactmessage = ContactMessage::findOrFail($id);
        $contactmessage->update($requestData);

        Session::flash('flash_message', 'ContactMessage updated!');

        return redirect('admin/contact-message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        ContactMessage::destroy($id);

        Session::flash('flash_message', 'ContactMessage deleted!');

        return redirect('admin/contact-message');
    }
}
