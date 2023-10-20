<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    // -- This method will show all services
    public function index() {
       return view('admin.services.list');
    }

    public function create() {
        return view('admin.services.create');
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            // Form Validated succesfully

            $service = new Service;
            $service->name = $request->name;
            $service->description = $request->description;
            $service->short_desc = $request->short_description;
            $service->status = $request->status;
            $service->save();

            if ($request->image_id > 0) {
                $tempImage = TempFile::where('id',$request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $ext = end($imageArray);

                $newFileName = 'service-'.$service->id.'.'.$ext;

                $sourcePath = './uploads/temp/'.$tempFileName;

                // Generate Small Thumbnail
                $dPath = './uploads/services/thumb/small/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->fit(360,220);
                $img->save($dPath);

                // Generate Large Thumbnail
                $dPath = './uploads/services/thumb/large/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $service->image = $newFileName;
                $service->save();


                File::delete($sourcePath);

                $request->session()->flash('success','Service Created Successfully');

                return response()->json([
                    'status' => 200,
                    'message' => 'Service Created Successfully'
                ]);
            }

        }else {
            // return errors
            
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit(){
        echo "Show Edit Service Form";
    }

    public function update(){
        echo "Update a Service in DB";
    }

    public function delete(){
        echo "Delete a service";
    }
}
