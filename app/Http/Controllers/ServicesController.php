<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        // Generate Model Service
        $services = Service::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $data['services'] = $services;

        return view('services', $data);
    }

    public function servicesdetail() {
        return view('services_detail');
    }

    public function detail($id){

        $service = Service::where('id',$id)->first();
        if(empty($service)) {
           return redirect('/');
        }

        $data['service'] = $service;
        return view('service-detail',$data);
    }
}
