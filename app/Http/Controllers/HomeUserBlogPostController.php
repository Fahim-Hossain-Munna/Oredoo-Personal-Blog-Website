<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Bloginventorytag\Inventorytag;
use App\Models\Blogpost;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class HomeUserBlogPostController extends Controller
{
    public function blog_post_index(){
        $my_blogs = Blogpost::where('user_id' , auth()->id())->paginate(10);
        $my_blogs_id = Blogpost::where('user_id' , auth()->id())->get();
        return view('dashboard.blogpost.index',compact('my_blogs','my_blogs_id'));
    }
    public function blog_post_insert(){
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('dashboard.blogpost.create',compact('categories','tags'));
    }
    public function blog_post_insert_post(Request $request){
        $request->validate([
            'blog_title' => 'required',
            'blog_category_id' => 'required',
            'blog_short_description' => 'required',
            'blog_long_description' => 'required',
            'blog_title_image' => 'required|image',
            'blog_publish_date' => 'required',
        ]);

        if($request->hasFile('blog_title_image')){
            $new_name_image = auth()->id() . "_" . mt_rand(0,9999) . "_".auth()->user()->name ."_". $request->blog_category_id ."_".now()->format('Y-m-d').".".$request->file('blog_title_image')->getClientOriginalExtension();
            $img = Image::make($request->file('blog_title_image'))->resize(1264, 948);
            $img->save(base_path('public/blog_images/'. $new_name_image), 80);

            $blog_post = Blogpost::create([
                'user_id' => auth()->id() ,
                'blog_title' => $request->blog_title ,
                'blog_category_id' => $request->blog_category_id ,
                'blog_short_description' => $request->blog_short_description ,
                'blog_long_description' => $request->blog_long_description ,
                'blog_title_image' => $new_name_image ,
                'blog_publish_date' => $request->blog_publish_date ,
                'created_at' => now(),
            ]);

            $blog_post->RelationWithTags()->attach($request->tags);

            $blog_post->save();

            return back()->with('blog_success' , 'Your Blog Story Insert Successfully Done');
        }
    }

    public function blog_post_add_tag($id){
        $my_blogs = Blogpost::findOrFail($id);
        $tags = Tag::latest()->get();

        return view('dashboard.blogpost.inventorytag',compact('tags' , 'my_blogs'));
    }

    public function blog_post_details_view($id){
        $only_this_id_details = Blogpost::findOrFail($id);
        // $related_tags = InventoryOfBlog::where('blog_id', $id)->get();
        return view('dashboard.blogpost.singledetails',compact('only_this_id_details'));
    }
    public function blog_post_edit($id){
        $my_blogs = Blogpost::findOrFail($id);
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('dashboard.blogpost.edit',compact('categories','my_blogs','tags'));
    }
    public function blog_post_update(Request $request, $id){

        // $blog_post = Blogpost::findOrFail($id)->update([
        //     'blog_title' => $request->blog_title ,
        //     'blog_category_id' => $request->blog_category_id ,
        //     'blog_short_description' => $request->blog_short_description ,
        //     'blog_long_description' => $request->blog_long_description ,
        //     'blog_publish_date' => $request->blog_publish_date ,
        //     'created_at' => now(),
        //   ]);
        $blog_post = Blogpost::findOrFail($id);

            $blog_post->blog_title = $request->blog_title;
            $blog_post->blog_category_id = $request->blog_category_id;
            $blog_post->blog_short_description = $request->blog_short_description;
            $blog_post->blog_long_description = $request->blog_long_description;
            $blog_post->blog_publish_date = $request->blog_publish_date;
            $blog_post->created_at = now();
            $blog_post->RelationWithTags()->sync($request->tags);

          $blog_post->save();

          $unlink_image = Blogpost::findOrFail($id);

          if($request->hasFile('blog_title_image')){
                unlink(public_path('blog_images/'. $unlink_image->blog_title_image));
                $new_name_image = auth()->id() . "_" .mt_rand(0,9999)."_" .auth()->user()->name ."_". $request->blog_category_id ."_".now()->format('Y-m-d').".".$request->file('blog_title_image')->getClientOriginalExtension();
                $img = Image::make($request->file('blog_title_image'))->resize(1264, 948);
                $img->save(base_path('public/blog_images/'. $new_name_image), 80);

                Blogpost::findOrFail($id)->update([
                    'blog_title_image' => $new_name_image ,
                    'created_at' => now(),
                  ]);
          }

          return redirect()->route('blogpost')->with('blog_update_success' , 'Your Blog Story Update Successfully Done');
    }

    public function blog_delete($id){
        Blogpost::findOrFail($id)->delete();

        return back()->with('blog_delete','Blog Deleted Successfully');
    }


}

