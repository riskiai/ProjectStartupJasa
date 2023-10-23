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
    public function index(Request $request) {

       $services = Service::orderBy('created_at', 'DESC');

       if(!empty($request->keyword)) {
        $services = $services->where('name', 'like', '%'.$request->keyword.'%');
       }
       $services = $services->paginate(5);

       $data['services'] = $services;

       return view('admin.services.list', $data);
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

            }

            $request->session()->flash('success','Service Created Successfully');

            return response()->json([
                'status' => 200,
                'message' => 'Service Created Successfully'
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
        $service = Service::where('id', $id)->first();
        
        if (empty($service)) {
            $request->session()->flash('error', 'Record not found in DB');
            return redirect()->route('serviceList');
        }

        $data['service'] = $service;

        return view('admin.services.edit', $data);
    }

    public function update($id, Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->passes()) {
            // Form Validated succesfully

            $service = Service::find($id);

            if (empty($service)) {
                $request->session()->flash('error', 'Record not found');
                return response()->json([
                    'status' => 0,
                ]);
            }

            $oldImageName = $service->image;
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

                $newFileName = 'service-'.strtotime('now').'-'.$service->id.'.'.$ext;

                $sourcePath = './uploads/temp/'.$tempFileName;

                // Generate Small Thumbnail
                $dPath = './uploads/services/thumb/small/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->fit(360,220);
                $img->save($dPath);

                // Delete old small thumbnail
                $sourcePathSmall = './uploads/services/thumb/small/'.$oldImageName; 
                File::delete($sourcePathSmall);

                // Generate Large Thumbnail
                $dPath = './uploads/services/thumb/large/'.$newFileName;
                $img = Image::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                // Delete old large thumbnail
                $sourcePathLarge = './uploads/services/thumb/large/'.$oldImageName; 
                File::delete($sourcePathLarge);
 
                $service->image = $newFileName;
                $service->save();


                File::delete($sourcePath);

            }

            $request->session()->flash('success','Service updated Successfully');

            return response()->json([
                'status' => 200,
                'message' => 'Service Created Successfully'
            ]);

        }else {
            // return errors
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function delete($id, Request $request){

        $service = Service::where('id', $id)->first();
        
        if (empty($service)) {

            $request->session()->flash('error', 'Record not found');

            return response([
                'status' => 0
            ]);
        }


        $path = './uploads/services/thumb/small/'.$service->image;
        File::delete($path);

        $path = './uploads/services/thumb/large/'.$service->image;
        File::delete($path);

        Service::where('id', $id)->delete();

        $request->session()->flash('success', 'Service deleted successfully.');

        return response([
            'status' => 1
        ]);
    }
}
