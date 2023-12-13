<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use App\Models\FeaturedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index(){
        $settings = Setting::find(1);

        $services = Service::orderBy('name', 'asc')->get();
        $featuredServices = FeaturedService::select('services.name', 'featured_services.*')
                           ->leftJoin('services', 'services.id', 'featured_services.service_id')
                           ->orderBy('sort_order', 'ASC')->get();

        return view('admin.settings', ['settings'=>$settings, 'services' => $services, 'featuredServices'=>$featuredServices]);
    }

    public function save(Request $request) {

        $validator = Validator::make($request->all(),[
            'website_title' => 'required'
        ]);

        parse_str($request->services,$serviceArray);

        
        if (!empty($serviceArray['service'])) {
           
            FeaturedService::truncate();
           
            foreach($serviceArray['service'] as $key => $service){
                $featuredService = new FeaturedService;
                $featuredService->service_id = $service;
                $featuredService->sort_order = $key;
                $featuredService->save();
            }
        }
       

        if($validator->passes()) {
            // Save From values here
            $settings = Setting::find(1);
            if ($settings == null){
                $settings = new Setting;
                $settings->website_title = $request->website_title; 
                $settings->email = $request->email;
                $settings->phone = $request->phone;                
                $settings->facebook_url = $request->facebook_url;
                $settings->twitter_url = $request->twitter_url;
                $settings->instagram_url = $request->instagram_url;
                $settings->contact_card_one = $request->contact_card_one;
                $settings->contact_card_two = $request->contact_card_two;
                $settings->contact_card_three = $request->contact_card_three;
                $settings->copy = $request->copy;
                $settings->save();
            } else {
                $settings->website_title = $request->website_title; 
                $settings->email = $request->email;
                $settings->phone = $request->phone;                
                $settings->facebook_url = $request->facebook_url;
                $settings->twitter_url = $request->twitter_url;
                $settings->instagram_url = $request->instagram_url;
                $settings->contact_card_one = $request->contact_card_one;
                $settings->contact_card_two = $request->contact_card_two;
                $settings->contact_card_three = $request->contact_card_three;
                $settings->copy = $request->copy;
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



