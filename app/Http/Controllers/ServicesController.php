<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        return view('services');
    }

    public function servicesdetail() {
        return view('services_detail');
    }
}
