<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        // Generate Model Service
        $services = Service::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $data['services'] = $services;
        

        return view('services', compact('services', 'blogs'));
    }

    public function servicesdetail() {
        return view('services_detail');
    }

    public function detail($id){

        $service = Service::where('id',$id)->first();
        if(empty($service)) {
           return redirect('/');
        }
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
         $data1['blogs'] = $blogs;

        $data['service'] = $service;
        return view('service-detail',$data, $data1);
    }
}
