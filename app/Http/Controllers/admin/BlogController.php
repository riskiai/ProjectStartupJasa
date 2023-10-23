<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{

    public function index(Request $request){
        // return view('admin.blog.list');

        $blogs = Blog::orderBy('created_at', 'DESC');

        if(!empty($request->keyword)) {
         $blogs = $blogs->where('name', 'like', '%'.$request->keyword.'%');
        }
        $blogs = $blogs->paginate(5);
 
        $data['blogs'] = $blogs;
 
        return view('admin.blog.list', $data);
    }


    // This Method will show create blog page
    public function create() {
        return view('admin.blog.create');
    }

    // This method will save a blog in DB
    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            // Form Validated succesfully


            $blog = new Blog;
            // $oldImageName = $blog->image;
            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->short_desc = $request->short_description;
            $blog->status = $request->status;
            $blog->save();

            if ($request->image_id > 0) {
                $tempImage = TempFile::where('id',$request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $ext = end($imageArray);

                $newFileName = 'blog-'.strtotime('now').'-'.$blog->id.'.'.$ext;

                $sourcePath = './uploads/temp/'.$tempFileName;

                // Generate Small Thumbnail
                $dPath = './uploads/blogs/thumb/small/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->fit(360,220);
                $img->save($dPath);

                // Delete old small thumbnail
                /*  
                    $sourcePathSmall = './uploads/services/thumb/small/'.$newFileName; 
                    File::delete($sourcePathSmall); 
                */

                // Generate Large Thumbnail
                $dPath = './uploads/blogs/thumb/large/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                // Delete old large thumbnail
                $sourcePathLarge = './uploads/services/thumb/large/'.$newFileName; 
                File::delete($sourcePathLarge);
 
                $blog->image = $newFileName;
                $blog->save();


                File::delete($sourcePath);

            }

            $request->session()->flash('success','Blog updated Successfully');

            return response()->json([
                'status' => 200,
                'message' => 'Blog Created Successfully'
            ]);

        }else {
            // return errors
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    }


    public function edit($id, Request $request) {
        $blog = Blog::where('id', $id)->first();
        
        if (empty($blog)) {
            $request->session()->flash('error', 'Record not found in DB');
            return redirect()->route('blogList');
        }

        $data['blog'] = $blog;

        return view('admin.blog.edit', $data);
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            // Form Validated succesfully

            $blog = Blog::find($id);

            if (empty($blog)) {
                $request->session()->flash('error', 'Record not found');
                return response()->json([
                    'status' => 0,
                ]);
            }

            $oldImageName = $blog->image;
            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->short_desc = $request->short_description;
            $blog->status = $request->status;
            $blog->save();

            if ($request->image_id > 0) {
                $tempImage = TempFile::where('id',$request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $ext = end($imageArray);

                $newFileName = 'blog-'.strtotime('now').'-'.$blog->id.'.'.$ext;

                $sourcePath = './uploads/temp/'.$tempFileName;

                // Generate Small Thumbnail
                $dPath = './uploads/blogs/thumb/small/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->fit(360,220);
                $img->save($dPath);

                // Delete old small thumbnail
                $sourcePathSmall = './uploads/blogs/thumb/small/'.$oldImageName; 
                File::delete($sourcePathSmall);

                // Generate Large Thumbnail
                $dPath = './uploads/blogs/thumb/large/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                // Delete old large thumbnail
                $sourcePathLarge = './uploads/blogs/thumb/large/'.$oldImageName; 
                File::delete($sourcePathLarge);
 
                $blog->image = $newFileName;
                $blog->save();


                File::delete($sourcePath);

            }

            $request->session()->flash('success','Blog updated Successfully');

            return response()->json([
                'status' => 200,
                'message' => 'Blog Updated Successfully'
            ]);

        }else {
            // return errors
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function delete($id, Request $request) {
        $blog = Blog::where('id', $id)->first();
        
        if (empty($blog)) {

            $request->session()->flash('error', 'Record not found');

            return response([
                'status' => 0
            ]);
        }


        $path = './uploads/blogs/thumb/small/'.$blog->image;
        File::delete($path);

        $path = './uploads/blogs/thumb/large/'.$blog->image;
        File::delete($path);

        Blog::where('id', $id)->delete();

        $request->session()->flash('success', 'Blog deleted successfully.');

        return response([
            'status' => 1
        ]);
    }
}
