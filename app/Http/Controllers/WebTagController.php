<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Tag;
use Illuminate\Http\Request;

class WebTagController extends Controller
{
    public function web_tag($id){
        $tags = Tag::where('id',$id)->first();
        $blogs = $tags->posts()->paginate(5);

        return view('frontend.tagpage.index',compact('blogs','tags'));
    }
}
