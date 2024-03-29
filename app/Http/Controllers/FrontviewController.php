<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Category;
use App\Models\GuestContactMessage;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontviewController extends Controller
{
    public function index(){
        $latest_posts = Blogpost::inRandomOrder()->limit(4)->get();
        $all_blogs = Blogpost::latest()->paginate(4);
        $categories = Category::all();
        $blogposts = Blogpost::inRandomOrder()->limit(5)->get();
        $tags = Tag::latest()->take(10)->get();
        return view('frontend.root.index',compact('categories','blogposts','all_blogs','latest_posts','tags'));
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
    public function web_author(){
        $categories = Category::all();
        $blogs = Blogpost::where('user_id',auth()->id())->paginate(5);
        $tags = Tag::all();
        return view('frontend.author.index',compact('blogs','categories','tags'));
    }
    public function web_contact_insert(Request $request){
         $request->validate([
            "*" => "required",
         ]);
         GuestContactMessage::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => now(),
         ]);

         return back()->with('message_send','Thanks for filling out our form "Admin - Oredoo Personal Blogsite"');
    }

    public function web_about(){
        return view('frontend.about.index');
    }
}
