<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\uploadServices;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    protected $upload;
    public function __construct(uploadServices $upload)
    {
        $this->upload = $upload;
    }

    public function store(Request $request){
         $url =  $this->upload->store($request);
         if($url != false){
               return response()->json([
                    'error' => false,
                   'url' => $url
               ]);
         }
                return response()->json(['error' => true]);
    }
    //
}
