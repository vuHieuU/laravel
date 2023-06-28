<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;

class sliderController extends Controller
{
    public function __construct()
    {
        $this->slider = new slider;
    }
    public function index()
    {
        $title = 'Danh sách slider';
        $listData = $this->slider->listData();
        return view('admin.slider.list',compact('title','listData'));
        //
    }
    public function create()
    {
        $title = 'Thêm slider';
        return view('admin.slider.add',compact('title'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'thumb'=>'required',
        ]);
        $insertData = [
            'name'=>$request->name,
            'url'=>$request->url,
            'active'=>$request->active,
            'sort_by'=>$request->sort_by,
            'thumb'=>$request->thumb,
        ];

        $this->slider->store($insertData);

        return redirect('admin/slider/add')->with('success','Bạn đã thêm thành công');
        //
    }
    public function edit($id){
        $title = 'Trang sửa sản phẩm';
        $dataUpdate = $this->slider->edit($id);
        $dataUpdate = $dataUpdate[0];
        return view('admin.slider.edit',compact('title','dataUpdate'));
    }
    public function update(Request $request,$id=0)
    {
        $request->validate([
            'name'=>'required',
            'thumb'=>'required',
        ]);
        $updateData = [
            'name'=>$request->name,
            'url'=>$request->url,
            'active'=>$request->active,
            'sort_by'=>$request->sort_by,
            'thumb'=>$request->thumb,
        ];

        $this->slider->handleUpdate($updateData,$id);

        return redirect('admin/slider/list');
        //
    }
    public function destroy($id){
        $this->slider->remove($id);
        return redirect('admin/slider/list');
    }
}
