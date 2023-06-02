<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail as FacadesMail;

class SendEmailController extends Controller
{
    public function send(Request $request)
    {
        try {
            FacadesMail::to(env('MAIL_TO_ADDRESS'))->send(new SendMail($request->except('_token')));
            return "OK";    
        } catch (\Throwable $th) {
            return $th;
        }
    }
}