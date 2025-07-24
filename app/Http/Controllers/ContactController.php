<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function StoreForm(Request $request){
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'msg' => 'required|string',
        ]);

        $email = Contact::create($validate);
        $email->save();

        return redirect()->route('contact')->with('success', 'Email sent successfully. ');
    }

    public function EmailList(){
            $record = Contact::orderBy('created_at', 'desc')->get();
            return view('Admin.email.email-list',compact('record'));
    }

    public function ViewEmail($id){
        $email = Contact::findorFail($id);
        return view('Admin.email.view-email',compact('email'));
    }

    public function MailReply(Request $request, $id){
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        $email = Contact::findorFail($id);
        Mail::raw($request->reply_message, function($message) use ($email){
            $message->to($email->email)
                ->subject('Re:' . $email->subject);
        });

        $email->reply_message = $request->reply_message;
        $email->save();

        return redirect()->route('view.email')->with('success', 'Email reply sent. ');
    }
}
