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
            'phone_number' => 'required_without:email|regex:/^[(\d][\d- )]{5,13}$/',
            'message' => 'string',
            'name' => 'required|string',
            'email' => 'email|required_without:phone_number',
        ]);

        if ($validator->fails()) {
            return redirect('/#contact')
                    ->withErrors($validator)
                    ->withInput();
        }

        $message = trans('homepage.success', [
                    'name' => ($request->name != '' ? ' '.$request->name : ''),
                    'best_time' => ($request->best_time != '' ? 'at '.$request->best_time : 'shortly')
                ]);

        Mail::send('emails.contact', ['request' => $request], function ($m) use ($request) {
            $m->from('mail@computerwhiz.com.au', 'Computer Whiz Mail');
            $m->to('mail@computerwhiz.com.au', 'Computer Whiz Mail')
              ->subject('Message from '.($request->name == '' ? 'anonymous' : $request->name));
        });
        return redirect('/#contact')->with('message', $message);
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

        $message = trans('customerinfo.success', ['name' => $request->name]);
        Mail::send('emails.customerinfo', ['request' => $request], function ($m) use ($request) {
            $m->from('mail@computerwhiz.com.au', 'Computer Whiz Mail');
            $m->to('mail@computerwhiz.com.au', 'Computer Whiz Mail')
              ->subject(trans('customerinfo.email-subject', ['name' => $request->name]));
        });
        return redirect('/customerinfo')->with('message', $message);
    }

    public function booknow(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'email|required_without:phone_number',
            'phone_number' => 'required_without:email|regex:/^[(\d][\d- )]{5,13}$/',
            'preferred_date' => 'date',
            'preferred_time' => ['regex:/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9] ?([aApP][mM])?$/'],

        ]);

        $name = $request->first_name.' '.$request->last_name;
        $message = trans('booknow.success', ['name' => $name]);
        Mail::send('emails.booknow', ['request' => $request], function ($m) use ($request, $name) {
            $m->from('mail@computerwhiz.com.au', 'Computer Whiz Mail');
            $m->to('mail@computerwhiz.com.au', 'Computer Whiz Mail')
              ->subject(trans('booknow.email-subject', ['name' => $name]));
        });
        return redirect('/booknow')->with('message', $message);
    }
}
