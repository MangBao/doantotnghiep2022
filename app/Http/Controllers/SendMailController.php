<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SendMailController extends Controller
{
    public function send(Request $request)
    {

        \Mail::send('mail.contact', ['request' => $request], function($message) use ($request){
            $message->from($request->email);
            $message->to($request->maillist)->subject('Hộp thư phản hồi');
        });

        return redirect()->back()->with('success', 'Gửi mail thành công');
    }
}
