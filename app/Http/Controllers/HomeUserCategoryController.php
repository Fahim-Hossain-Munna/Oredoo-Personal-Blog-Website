<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeUserCategoryController extends Controller
{
    public function category_index(){
        return view('dashboard.category.index');
    }
}
