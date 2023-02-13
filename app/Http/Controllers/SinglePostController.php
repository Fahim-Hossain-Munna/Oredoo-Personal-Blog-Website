<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\InventoryOfBlog;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function single_post($id){

        $single_post = Blogpost::findOrFail($id);
        $tags = InventoryOfBlog::where('blog_id',$id)->get();
        return view('frontend.single_post.single_post',compact('single_post','tags'));
    }
}
