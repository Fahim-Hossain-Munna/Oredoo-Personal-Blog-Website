<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\InventoryOfBlog;
use App\Models\Tag;
use Illuminate\Http\Request;

class WebTagController extends Controller
{
    public function web_tag($id){
        $tag = InventoryOfBlog::where('tag_id',$id)->get();
        return $tag;
    }
}
