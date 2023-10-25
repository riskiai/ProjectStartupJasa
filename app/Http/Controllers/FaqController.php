<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){

        $blogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        $data1['blogs'] = $blogs;

        $faq = Faq::orderBy('created_at', 'DESC')->where('status',1)->get();
        return view('faq', ['faq' => $faq], $data1);
    }
}
