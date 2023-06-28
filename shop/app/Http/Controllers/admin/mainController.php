<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function index(){
        $title = "Trang quản trị";
        return view('admin.home',compact('title'));
    }
}
