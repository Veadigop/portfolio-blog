<?php
/**
 * Created by PhpStorm.
 * User: veadigop
 * Date: 01/05/2018
 * Time: 15:44
 */

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact.index');
    }

    public function sendMail(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255',
            'message' =>'required|max:255',
            'phone' =>'required|min:11|numeric|phone'
        ]);

        if ($validator->fails()) {
            return redirect('/contact')
                ->withInput()
                ->withErrors($validator);
        } else {

            Mail::send('email.contact-mail', $data = ['name'=>$request->name, 'email'=>$request->email, 'message_body'=>$request->message], function($message) use ($data){
                $message->from($data['email'], $data['name']);
                $message->to('veadigop@gmail.com', 'fgggt')->subject('Veadigop Site');
            });

            Mail::send('email.contact-mail-response', $data = ['name'=>$request->name, 'email'=>$request->email, 'message_body'=>$request->message], function($message) use ($data){
                $message->from('veadigop@gmail.com' , 'Thank you');
                $message->to($data['email'], 'Thank you')->subject('Veadigop Site');
            });

            Session::flash('mail_sent', 'Mail Sent Successfully!');
            return redirect('/contact');
        }
    }
}