<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::with('blog')->orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $comments = $comments->where('name', 'like', '%' . $request->keyword . '%');
        }

        $comments = $comments->paginate(5);

        $data['comments'] = $comments;

        return view('admin.comment.list', $data);
    }

    public function edit($id, Request $request) {
        $comment = Comment::find($id);
        return view('admin.comment.edit', compact('comment'));
    }    

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'status' => 'required'
        ]);
    
        if ($validator->passes()) {
            
            $comment =  Comment::where('id', $id)->update([
                'status' => $request->status
            ]);
    
            $request->session()->flash('success', 'Comment updated successfully');
    
            return response()->json([
                'status' => 200,
            ]);
    
        } else {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    }
    

    
    public function delete($id, Request $request) {

        Comment::where('id', $id)->delete();
        
        $request->session()->flash('success', 'Comment deleted successfully');

        return response()->json([
            'status' => 200,
        ]);
    }
}
