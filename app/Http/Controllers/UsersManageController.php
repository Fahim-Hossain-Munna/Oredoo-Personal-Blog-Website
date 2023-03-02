<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersManageController extends Controller
{
    public function user_index(){
        $users = User::latest()->paginate(20);
        return view('dashboard.users_list.index',compact('users'));
    }
    public function user_search_index(Request $request){
        $search = $request->search;
        $users = User::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->paginate(20);
        return view('dashboard.users_list.index',compact('users'));
    }
    public function user_delete_index($id){
        User::findOrFail($id)->delete();

        return back()->with('block','User Block Successfully');
    }
}
