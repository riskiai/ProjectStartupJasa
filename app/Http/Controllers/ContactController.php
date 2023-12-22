<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $settings = getSettings();
        return view('contact', ['settings' => $settings]);
    }

    public function sendEmail(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $emailData = [];
        if($validator->passes()) {
            $emailData['name'] = $request->name;
            $emailData['email'] = $request->email;
            $emailData['phone'] = $request->phone;
            $emailData['message'] = $request->message;

            Mail::to('riskiahmadiilham@gmail.com')->send(new ContactMail($emailData));

            $request->session()->flash('success', 'Terima kasih telah menghubungi kami, kami akan segera menghubungi Anda.');

            return response()->json([
                'status' => 200,
            ]);
        }else {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    }
}
