<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        // Generate Model Service
        $welcomes = Welcome::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $data['welcomes'] = $welcomes;
        

        return view('welcomes', $data);
    }

}
