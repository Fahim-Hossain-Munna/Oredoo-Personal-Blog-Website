<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class HomeUserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function profile_index(){
        $my_skills= Skill::where('user_id',auth()->id())->get();
        return view('dashboard.userprofile.profile',compact('my_skills'));
    }
    public function profile_settings(){
        return view('dashboard.userprofile.settings');
    }
    public function skills(){
        return view('dashboard.userprofile.skills');
    }
    public function profile_name(Request $request , $id){
        $request->validate([
            "name" => 'required'
        ]);
        // email:rfc,dns
        User::findOrFail($id)->update([
            'name' => $request->name,
            'created_at' => now()
        ]);
        return back()->with('name_success', 'Your username successfully updated');
    }
    public function profile_email(Request $request , $id){
        $request->validate([
            "email" => 'required'
        ]);
        // email:rfc,dns
        User::findOrFail($id)->update([
            'email' => $request->email,
            'created_at' => now()
        ]);
        return back()->with('mail_success', 'Your mail successfully updated');
    }
    public function profile_password(Request $request , $id){
        $request->validate([
            "current_password" => 'required',
            "password" => 'required|confirmed|min:8',
        ]);

        if(Hash::check($request->current_password , auth()->user()->password)){
            User::findOrFail($id)->update([
                'password' => $request->password,
                'created_at' => now()
            ]);
            return back()->with('password_success', 'Your password successfully updated');
        }else{
            return back()->with('old_password_not_match' ,'given value does not match with old password');
        }

    }
    public function profile_picture(Request $request , $id){
        $request->validate([
            "user_photo" => 'required|image',
        ]);
        if($request->hasfile('user_photo')){
            if(auth()->user()->user_photo != 'default.jpg'){

                unlink(public_path('profile_image_user/' . auth()->user()->user_photo));
                $new_name = auth()->id() ."_". auth()->user()->name . "_" . now()->format("Y-m-d").".". $request->file('user_photo')->getClientOriginalExtension();
                $img = Image::make($request->file('user_photo'))->resize(500, 500);
                $img->save(base_path('public/profile_image_user/'. $new_name) , 80);

                User::findOrFail($id)->update([
                    'user_photo' => $new_name,
                    'created_at' => now(),
                ]);

                return back()->with('picture_success', 'Your picture successfully updated');
            }else{
                $new_name = auth()->id() ."_". auth()->user()->name . "_" . now()->format("Y-m-d").".". $request->file('user_photo')->getClientOriginalExtension();
                $img = Image::make($request->file('user_photo'))->resize(500, 500);
                $img->save(base_path('public/profile_image_user/'. $new_name) , 80);

                User::findOrFail($id)->update([
                    'user_photo' => $new_name,
                    'created_at' => now(),
                ]);

                return back()->with('picture_success', 'Your picture successfully updated');
            }

        }

    }

    public function profile_biodata(Request $request,$id){

        $request->validate([
            'about_user' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'height' => 'required',
            'blood_group' => 'required',
        ]);

        User::findOrFail($id)->update([
            'nid_no' => $request->nid_no,
            'about_user' => $request->about_user,
            'address' => $request->address,
            'contact' => $request->contact,
            'gender' => $request->gender,
            'age' => $request->age,
            'religion' => $request->religion,
            'marital_status' => $request->marital_status,
            'height' => $request->height,
            'blood_group' => $request->blood_group,
            'created_at' => now(),
        ]);

        return back()->with('biodata_update', 'Your Bio Information successfully updated');

    }
}
