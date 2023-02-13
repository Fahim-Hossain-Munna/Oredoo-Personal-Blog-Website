<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeUserTagController extends Controller
{
    public function tag_index(){
        return view('dashboard.tag.index');
    }
}
