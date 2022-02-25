<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailRender;
use App\Mail\SenderMailRender;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function submit(Request $request) {
        $objDemo = new \stdClass();
        $objDemo->name=$request->name;
        $objDemo->email=$request->email;
        $objDemo->message=$request->message;

        Mail::to("matvey20.18@bk.ru")
            ->send(new MailRender($objDemo));

        Mail::to($objDemo->email)
            ->send(new SenderMailRender($objDemo));

        return response()->json(null, 200);
    }
}
