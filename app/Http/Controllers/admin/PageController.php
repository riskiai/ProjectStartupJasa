<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PageController extends Controller
{
    public function index(Request $request) {
        $pages = Page::orderBy('created_at', 'DESC');

        if(!empty($request->keyword)) {
         $pages = $pages->where('name', 'like', '%'.$request->keyword.'%');
        }
 
        $data['pages'] = $pages->paginate(20);
 
        return view('admin.pages.list', $data);
    }

    public function create(){
        return view('admin.pages.create');
    }

    // This method will save a page in DB 
    public function save(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->passes()) {

            $page = new Page;
            $page->name = $request->name;
            $page->content = $request->content;
            $page->status = $request->status;
            $page->save();

            if ($request->image_id > 0) {


                $tempImage = TempFile::where('id',$request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $ext = end($imageArray);

                $newFileName = 'page-'.strtotime('now').'-'.$page->id.'.'.$ext;

                $sourcePath = './uploads/temp/'.$tempFileName;

                // Generate Small Thumbnail
                // $dPath = './uploads/pages/thumb/small/'.$newFileName;
                // $img = Image::make($sourcePath);
                // $img->fit(360,220);
                // $img->save($dPath);

                // Delete old small thumbnail
                /*  
                    $sourcePathSmall = './uploads/services/thumb/small/'.$newFileName; 
                    File::delete($sourcePathSmall); 
                */

                // Generate Large Thumbnail
                $dPath = './uploads/pages/thumb/large/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                // // Delete old large thumbnail
                // $sourcePathLarge = './uploads/pages/thumb/large/'.$newFileName; 
                // File::delete($sourcePathLarge);
 
                // This will update image in DB
                $page->image = $newFileName;
                $page->save();

                File::delete($sourcePath);

            }

            $request->session()->flash('success','Page Created successfully');

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

    public function edit($id, Request $request) {
        $page = Page::where('id',$id)->first();


        if ($page == null) {
            return redirect()->route('pageList');
        }

        $data['page'] = $page;
        return view('admin.pages.edit', $data);
    }

    public function update($id, Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->passes()) {

            $page = Page::find($id);
            $page->name = $request->name;
            $page->content = $request->content;
            $page->status = $request->status;
            $page->save();

            $oldImageName = $page->name;

            if ($request->image_id > 0) {

                $tempImage = TempFile::where('id',$request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $ext = end($imageArray);

                $newFileName = 'page-'.$page->id.'.'.$ext;

                $sourcePath = './uploads/temp/'.$tempFileName;

                // Generate Small Thumbnail
                // $dPath = './uploads/pages/thumb/small/'.$newFileName;
                // $img = Image::make($sourcePath);
                // $img->fit(360,220);
                // $img->save($dPath);

                // Delete old small thumbnail
                /*  
                    $sourcePathSmall = './uploads/services/thumb/small/'.$newFileName; 
                    File::delete($sourcePathSmall); 
                */

                // Generate Large Thumbnail
                $dPath = './uploads/pages/thumb/large/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                // // Delete old large thumbnail
                // $sourcePathLarge = './uploads/pages/thumb/large/'.$newFileName; 
                // File::delete($sourcePathLarge);
 
                // This will update image in DB
                $page->image = $newFileName;
                $page->save();

                File::delete('./uploads/pages/thumb/large/'.$oldImageName);
                File::delete($sourcePath);

            }

            $request->session()->flash('success','Page Updated successfully');

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

        $page = Page::where('id', $id)->first();
        File::delete('./uploads/pages/thumb/large/'.$page->image);
        $page->delete();

        $request->session()->flash('success','Page deleted successfully');

        return response()->json([
            'status' => 200,
        ]);

    }

    public function deleteImage(Request $request) {
        $page = Page::find($request->id);
        $oldImage = $page->image;
        
        $page->image = '';
        $page->save();

        File::delete('./uploads/pages/thumb/large/'.$oldImage);

        return response()->json([
            'status' => 200,
        ]);
    }

  }
