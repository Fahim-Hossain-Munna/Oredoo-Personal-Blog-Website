<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontviewController extends Controller
{
    public function index(){

        $categories = Category::all();
        $blogposts = Blogpost::latest()->take(2)->get();
        return view('frontend.root.index',compact('categories','blogposts'));
    }
    public function web_category($slug,$id){
        $category_name = Category::findOrFail($id);
        $posts = Blogpost::where('blog_category_id',$id)->paginate(5);
        return view('frontend.category.category',compact('posts','category_name'));
    }
}
