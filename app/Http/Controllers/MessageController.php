<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\Messages;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class MessageController extends Controller
{
    public function showMessage($id)
    {
        $message = Message::find($id);
        $message->isRead = true;
        $message->update();



        return view('admin.layouts.messagesFromUser.message', compact('message'));
    }

    public function showReplay($id){
        $msg = Message::findOrFail($id);
        Return view('admin.layouts.messagesFromUser.showReply',compact('msg'));
    }


    public function sendMail(Request $request , $id)
    {
        $details = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        $user = Message::findOrFail($id);

        Mail::to($user->email)->send(new Messages($details));

        return redirect()->back()->with('success','email sent ');
    }
}
