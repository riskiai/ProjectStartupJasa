<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Welcome;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class WelcomeController extends Controller
{
    public function index(Request $request) {
        $welcomes = Welcome::orderBy('created_at', 'DESC');

        if(!empty($request->keyword)) {
         $welcomes = $welcomes->where('name', 'like', '%'.$request->keyword.'%');
        }
        $welcomes = $welcomes->paginate(5);
 
        $data['welcomes'] = $welcomes;
 
        return view('admin.welcome.list', $data);
    }

    public function create(){
        return view('admin.welcome.create');
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            // Form Validated succesfully

            $welcome = new Welcome;
            $welcome->name = $request->name;
            $welcome->description = $request->description;
            $welcome->short_desc = $request->short_description;
            $welcome->status = $request->status;
            $welcome->save();

            if ($request->image_id > 0) {
                $tempImage = TempFile::where('id',$request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $ext = end($imageArray);

                $newFileName = 'welcome-'.$welcome->id.'.'.$ext;

                $sourcePath = './uploads/temp/'.$tempFileName;

                // Generate Small Thumbnail
                $dPath = './uploads/welcomes/thumb/small/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->fit(360,220);
                $img->save($dPath);

                // Generate Large Thumbnail
                $dPath = './uploads/welcomes/thumb/large/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $welcome->image = $newFileName;
                $welcome->save();

                File::delete($sourcePath);

            }

            $request->session()->flash('success','Welcome Created Successfully');

            return response()->json([
                'status' => 200,
                'message' => 'Welcome Created Successfully'
            ]);

        }else {
            // return errors
            
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    }    


    public function edit($id, Request $request){
        $welcome = Welcome::where('id', $id)->first();
        
        if (empty($welcome)) {
            $request->session()->flash('error', 'Record not found in DB');
            return redirect()->route('welcomeList');
        }

        $data['welcome'] = $welcome;

        return view('admin.welcome.edit', $data);
    }

    public function update($id, Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            // Form Validated succesfully

            $welcome = Welcome::find($id);

            if (empty($welcome)) {
                $request->session()->flash('error', 'Record not found');
                return response()->json([
                    'status' => 0,
                ]);
            }

            $oldImageName = $welcome->image;
            $welcome->name = $request->name;
            $welcome->description = $request->description;
            $welcome->short_desc = $request->short_description;
            $welcome->status = $request->status;
            $welcome->save();

            if ($request->image_id > 0) {
                $tempImage = TempFile::where('id',$request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $ext = end($imageArray);

                $newFileName = 'welcome-'.strtotime('now').'-'.$welcome->id.'.'.$ext;

                $sourcePath = './uploads/temp/'.$tempFileName;

                // Generate Small Thumbnail
                $dPath = './uploads/welcomes/thumb/small/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->fit(360,220);
                $img->save($dPath);

                // Delete old small thumbnail
                $sourcePathSmall = './uploads/welcomes/thumb/small/'.$oldImageName; 
                File::delete($sourcePathSmall);

                // Generate Large Thumbnail
                $dPath = './uploads/welcomes/thumb/large/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                // Delete old large thumbnail
                $sourcePathLarge = './uploads/welcomes/thumb/large/'.$oldImageName; 
                File::delete($sourcePathLarge);
 
                $welcome->image = $newFileName;
                $welcome->save();


                File::delete($sourcePath);

            }

            $request->session()->flash('success','Welcome updated Successfully');

            return response()->json([
                'status' => 200,
                'message' => 'Welcome Updated Successfully'
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
        $welcome = Welcome::where('id', $id)->first();
        
        if (empty($welcome)) {

            $request->session()->flash('error', 'Record not found');

            return response([
                'status' => 0
            ]);
        }


        $path = './uploads/welcomes/thumb/small/'.$welcome->image;
        File::delete($path);

        $path = './uploads/welcomes/thumb/large/'.$welcome->image;
        File::delete($path);

        Welcome::where('id', $id)->delete();

        $request->session()->flash('success', 'Welcome deleted successfully.');

        return response([
            'status' => 1
        ]);
    }
}
