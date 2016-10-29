<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Site;
use App\Blog;
use App\User;
use App\News;
use App\Album;
use App\Logo;
use App\CalendarEvent;
use App\Slider;

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
            'sliders_counter' => Slider::count()
        ]);
    }

}
