<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Category;
use App\Models\GuestContactMessage;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $categories = Category::all();
        $messages = GuestContactMessage::all();
        $blogs = Blogpost::all();
        $tags = Tag::all();
        return view('dashboard.rootpage.rootpage',compact('users','categories','messages','blogs','tags'));
    }
    public function view()
    {
        return view('dashboard.rootpage.rootpage');
    }
}
