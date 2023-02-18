<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontviewController extends Controller
{
    public function index(){
        $latest_posts = Blogpost::inRandomOrder()->limit(4)->get();
        $all_blogs = Blogpost::latest()->paginate(4);
        $categories = Category::all();
        $blogposts = Blogpost::latest()->take(2)->get();
        return view('frontend.root.index',compact('categories','blogposts','all_blogs','latest_posts'));
    }
    public function web_category($slug,$id){
        $category_name = Category::findOrFail($id);
        $posts = Blogpost::where('blog_category_id',$id)->paginate(5);
        return view('frontend.category.category',compact('posts','category_name'));
    }
    public function web_blog(){
        $all_blogs = Blogpost::latest()->paginate(5);
        return view('frontend.blog.index',compact('all_blogs'));
    }
    public function web_contact(){
        return view('frontend.contact.index');
    }
    public function web_contact_insert(Request $request){
        return $request;
    }
}
