<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\SinglePostComment;
use App\Models\Tag;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function single_post($id){
        $show_comments = SinglePostComment::where('blog_id',$id)->latest()->take(5)->get();
        $single_post = Blogpost::findOrFail($id);
        // $tags = Tag::where('blogpost_id',$id)->get();
        return view('frontend.single_post.single_post',compact('single_post','show_comments'));
    }
    public function single_post_comment(Request $request ,$id){
         $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
         ]);

         SinglePostComment::insert([
            'blog_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'created_at' => now(),
         ]);

         return back()->with('comment_done_msg' , 'Your comment was apply successfully');
    }

    public function single_post_comment_delete($id){
         SinglePostComment::findOrFail($id)->delete();
         return back()->with('comment_delete','Your comment was delete successfully');
    }
}
