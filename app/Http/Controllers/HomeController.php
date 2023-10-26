<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
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

        $page = Page::where('id',14)->first();
        return view('about',['page' => $page] ,$data1);
    }


    public function privacy() {
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $data1['blogs'] = $blogs;

        $page = Page::where('id',16)->first();
        return view('static-page',['page' => $page], $data1);
    }

    public function terms() {
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $data1['blogs'] = $blogs;

        $page = Page::where('id',15)->first();
        return view('static-page',['page' => $page], $data1);
    }
}
