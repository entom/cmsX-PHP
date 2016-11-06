<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Site;
use App\Model\Blog;
use App\Model\User;
use App\Model\News;
use App\Model\Album;
use App\Model\Logo;
use App\Model\CalendarEvent;
use App\Model\Slider;
use App\Model\Paralax;

/**
 * Class Dashboard
 * @package App\Http\Controllers\Admin
 */
class Dashboard extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        return view('admin.dashboard.home', [
            'users_counter' => User::count(),
            'sites_counter' => Site::count(),
            'blogs_counter' => Blog::count(),
            'news_counter' => News::count(),
            'albums_counter' => Album::count(),
            'logos_counter' => Logo::count(),
            'calendar_events_counter' => CalendarEvent::count(),
            'sliders_counter' => Slider::count(),
            'paralax_counter' => Paralax::count()
        ]);
    }

}
