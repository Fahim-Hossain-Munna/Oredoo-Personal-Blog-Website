<?php

namespace App\Http\Controllers;

use App\Models\GuestContactMessage;
use Illuminate\Http\Request;
use App\Mail\ContactMessageInboxMail;
use Mail;

class ContactInboxController extends Controller
{
    public function contact_message(){
        $messages = GuestContactMessage::latest()->paginate(5);
        return view('dashboard.ContactMessages.inbox',compact('messages'));
    }
    public function contact_message_mail_send(Request $request,$id){
        $all_info = GuestContactMessage::findOrFail($id);
        Mail::to($all_info->email)->send(new ContactMessageInboxMail($all_info,$request->except('_token')));
        return back()->with('mail_send','Mail Send Successfully');

    }
    public function contact_message_mail_delete($id){
        GuestContactMessage::findOrFail($id)->delete();

        return back()->with('delete_msg','Mail Delete Successfully');
    }
}
