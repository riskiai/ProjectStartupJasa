<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index(){
        $settings = Setting::find(1);

        $services = Service::orderBy('name', 'asc')->get();
        return view('admin.settings', ['settings'=>$settings, 'services' => $services]);
    }

    public function save(Request $request) {

        $validator = Validator::make($request->all(),[
            'website_title' => 'required'
        ]);

        if($validator->passes()) {
            // Save From values here
            $settings = Setting::find(1);
            if ($settings == null){
                $settings = new Setting;
                $settings->website_title = $request->website_title; 
                $settings->email = $request->email;
                $settings->phone = $request->phone;                
                $settings->facebook_url = $request->facebook_url;
                $settings->twiter_url = $request->twiter_url;
                $settings->instagram_url = $request->instagram_url;
                $settings->contact_card_one = $request->contact_card_one;
                $settings->contact_card_two = $request->contact_card_two;
                $settings->contact_card_three = $request->contact_card_three;
                $settings->save();
            } else {
                $settings->website_title = $request->website_title; 
                $settings->email = $request->email;
                $settings->phone = $request->phone;                
                $settings->facebook_url = $request->facebook_url;
                $settings->twiter_url = $request->twiter_url;
                $settings->instagram_url = $request->instagram_url;
                $settings->contact_card_one = $request->contact_card_one;
                $settings->contact_card_two = $request->contact_card_two;
                $settings->contact_card_three = $request->contact_card_three;
                $settings->save();
            }

            $request->session()->flash('success', 'Settings saved successfully');

            return response()->json([
                'status' => 200,
            ]); 

        } else {
            // return errors here

            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]); 
        }
    }
}



