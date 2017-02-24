<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create_user(){
    	return view('admin.create_user');
    }

    public function create_status(){
    	return view('admin.create_status');
    }


}
