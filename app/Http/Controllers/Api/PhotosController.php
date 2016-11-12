<?php
/**
 * Created by PhpStorm.
 * User: tomasznicieja
 * Date: 12.11.2016
 * Time: 13:00
 */

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Session;

use App\Model\Photo;
use App\Model\ImageProcessing;

/**
 * Class PhotosController
 * @package App\Http\Controllers\Api
 */
class PhotosController extends Controller
{
    /**
     * PhotosController constructor.
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
        $photos = Photo::orderBy('position', 'asc')->all();
        return Response::json(array('photos' => $photos));
    }

    /**
     * store method
     * @return mixed
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $requestData['position'] = Photo::count() + 1;
        $requestData['active'] = 1;

        $image = $request->file('file');
        if(!empty($image)) {
            $fileName = ImageProcessing::transferThumbs($image, 'photos', Photo::$SIZES);
            $requestData['file'] = $fileName;
        }
        Photo::create($requestData);

        return Response::json(array('success' => true));
    }

    public function show($album_id)
    {
        $photos = Photo::where('album_id', '=', $album_id)->orderBy('position', 'asc')->get();
        return Response::json(array('photos' => $photos));
    }

}
