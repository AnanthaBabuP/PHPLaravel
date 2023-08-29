<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function basicEmail() {
        $data = ['name' => "Anantha Babu"];
        
        Mail::send(['text' => 'mailContant.mail'], $data, function ($message) {
            $message->to('receiver@gmail.com', 'Check Point')
                    ->subject('Laravel Basic Testing Mail')
                    ->from('sender@gmail.com', 'Anantha Babu');
        });
        
        return "Basic Email Sent. Check your inbox.";
    }

    public function htmlEmail() {
        $data = ['name' => "Anantha Babu"];
        
        Mail::send('mail', $data, function ($message) {
            $message->to('receiver@gmail.com', 'Tutorials Point')
                    ->subject('Laravel HTML Testing Mail')
                    ->from('sender@gmail.com', 'Anantha Babu');
        });
        
        return "HTML Email Sent. Check your inbox.";
    }

    public function attachmentEmail() {
        $data = ['name' => "Anantha babu"];
        
        Mail::send('mail', $data, function ($message) {
            $message->to('receiver@gmail.com', 'Tutorials Point')
                    ->subject('Laravel Testing Mail with Attachment')
                    ->attach(public_path('uploads/image.png'))
                    ->attach(public_path('uploads/test.txt'))
                    ->from('sender@gmail.com', 'Anantha babu');
        });
        
        return "Email Sent with attachment. Check your inbox.";
    }
}
