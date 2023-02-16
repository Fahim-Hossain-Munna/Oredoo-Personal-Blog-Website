<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;

class WebSearchController extends Controller
{
    public function web_search(Request $request){

        $search = $request['websearch'] ?? "";
        if($search != ""){
            $all_blogs = Blogpost::where('blog_title',"LIKE","%$search%")->orwhere('blog_short_description','LIKE',"%$search%")->paginate(5);
        }else{
            return redirect()->route('index')->with('failed_search','Blog Not Found!!');
        }
        return view('frontend.search.search',compact('all_blogs'));
    }
}
