<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // -- This method will show all services
    public function index() {
        echo "List Services";
    }

    public function create() {
        return view('admin.services.create');
    }

    public function save(){
        echo "Save Service in DB";
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
