<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;

class GeneralController extends Controller
{
    public function callback(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'phone_number' => 'required|regex:/^[(\d][\d- )]{5,13}$/',
            'message' => 'string',
            'name' => 'string',
        ]);

        if ($validator->fails()) {
            return redirect('/#callback')
                    ->withErrors($validator)
                    ->withInput();
        }

        $message = 'Thanks for the message'.($request->name != '' ? ' '.$request->name : '').
            '. We\'ll call you '.($request->best_time != '' ? 'at '.$request->best_time : 'shortly');

        Mail::send('emails.contact', ['request' => $request], function ($m) use ($request) {
            $m->from('web@computerwhiz.com.au', 'CW Website');
            $m->to('mail@computerwhiz.com.au', 'Derek')
              ->subject('Message from '.$request->name == '' ? 'anonymous' : $request->name);
        });
        return redirect('/#callback')->with('message', $message);
    }

    public function customerinfo()
    {
        return view('content.customerinfo');
    }

    public function customerinfo_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
// dd($request);
        $message = 'Thanks for submitting your information';
        Mail::send('emails.customerinfo', ['request' => $request], function ($m) use ($request) {
            $m->from($request->email, $request->name);
            $m->to('mail@computerwhiz.com.au', 'Derek')
              ->subject('Customer Info for '.$request->name);
        });
        return redirect('/customerinfo')->with('message', $message);
    }
}
