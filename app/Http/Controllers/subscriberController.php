<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class subscriberController extends Controller
{
    public function subscriber(Request $request){
        $request->validate([
            'email_newslatter' => 'required',
        ]);
        if (Newsletter::isSubscribed($request->email_newslatter) ) {
            return back()->with('subscribe_once','Your email already exists');
        }else{
            Newsletter::subscribe($request->email_newslatter);
            return back()->with('subscribe_done','Your Subscribption Successfully Done');
        }

    }
}
