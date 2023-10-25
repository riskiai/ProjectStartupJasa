<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
         // Generate Model Service
         $services = Service::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
         $data['services'] = $services;

         $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
         $data1['blogs'] = $blogs;

        return view('home',$data, $data1);
    }

    public function about() {

        $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $data1['blogs'] = $blogs;

        return view('about' ,$data1);
    }
}
