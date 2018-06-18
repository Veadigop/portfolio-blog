<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:10,1')->only('index');
    }

    public function index(Request $request)
    {
        if($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|string|email|max:255',
                'message' => 'required|max:255',
                'phone' => 'required|min:11|phone'
            ]);

            if ($validator->fails()) {
                return redirect('/contact')
                    ->withInput()
                    ->withErrors($validator);
            } else {

                $data = [
                    'name' => $request->name,
                    'email' => 'support@team-breeze.com',
                    'customer_email' => $request->email,
                    'message_body' => $request->message,
                    'phone'=>$request->phone,
                ];

                Mail::send('email.contact-email', $data, function ($message) use ($data) {
                    $message->from($data['email'], $data['name']);
                    $message->to('team.breeze.contacts@gmail.com', '')->subject('Veadigop Site');
                });

                Session::flash('mail_sent', 'Mail Sent Successfully!');
                return back();

            }
        }

        return view('contact.index');
    }

}