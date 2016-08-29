<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class Hello
 * @package App\Http\Controllers
 */
class Hello extends Controller
{

    /**
     * @return string
     */
    public function index()
    {
        return 'Hello world!';
    }

    /**
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($name)
    {
        return view('hello.show', ['name' => $name]);
    }

}
