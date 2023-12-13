<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Service;
use App\Models\Welcome;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $services = Service::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $welcomes = Welcome::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        
        /* Untuk Menggabungkan Beberapa Data Harus Pakai Array Asosiatif */
        $data = [
            'services' => $services,
            'blogs' => $blogs,
            'welcomes' => $welcomes,
        ];
    
        return view('home', $data);
    }

    public function about() {

        $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $data1['blogs'] = $blogs;

        $page = Page::where('id',1)->first();
        return view('about',['page' => $page] ,$data1);
    }


    public function privacy() {
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $data1['blogs'] = $blogs;

        $page = Page::where('id',2)->first();
        return view('static-page',['page' => $page], $data1);
    }

    public function terms() {
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $data1['blogs'] = $blogs;

        $page = Page::where('id',3)->first();
        return view('static-page',['page' => $page], $data1);
    }
}
