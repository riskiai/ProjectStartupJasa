<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $commentCount = Comment::count();
        $commentsData = Comment::select('name', 'comment', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        $faqCount = Faq::count();
        $blogCount = Blog::count();
        $serviceCount = Service::count();

        return view('admin.dashboard', compact('commentCount', 'commentsData', 'faqCount', 'blogCount', 'serviceCount'));
    }
}

