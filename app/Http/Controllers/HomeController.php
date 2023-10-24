<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
         // Generate Model Service
         $services = Service::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
         $data['services'] = $services;

         

        return view('home',$data);
    }

    public function about() {
        return view('about');
    }
}
