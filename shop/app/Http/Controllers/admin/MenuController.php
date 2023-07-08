<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\menu;
use Illuminate\Support\Facades\Session;

//use App\Http\Services\Menu\MenuServices;

class MenuController extends Controller
{
     protected $menu;

      public function __construct()
      {
//          $this->MenuServices = MenuServices;
          $this->menu = new menu;
      }

      public function index(){
          $title = 'Danh sách danh mục';
          $listData = $this->menu->getData();
            return view('admin.menu.list',compact('title','listData'));
      }
    //
     public function create(){
         $title = 'Thêm Danh mục';
         $getParentId = $this->menu->getParentId();
           return view('admin.menu.add',compact('title','getParentId'));
     }
    public function store(Request $request){
          $request->validate([
              'name'=>'required',
          ]);

          $insertData = [
              'name'=>$request->name,
              'parent_id'=>$request->parent_id,
              'description'=>$request->description,
              'content'=>$request->content,
              'active'=>$request->active,
          ];

          $this->menu->create($insertData);

          return redirect('admin/menu/add')->with('success','Bạn đã thêm thành công');

    }
    public function showEdit(Request $request,$id){
           $title = 'Trang chỉnh sửa sản phẩm';
           $getParentId = $this->menu->getParentId();
           $listData = $this->menu->showEdit($id);
           $listData = $listData[0];
          return view('admin/menu/edit',compact('title','getParentId','listData'));

}
    public function handleEdit(Request $request,$id=0){
        $request->validate([
            'name'=>'required',
        ]);
        $UpdateData = [
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'description'=>$request->description,
            'content'=>$request->content,
            'active'=>$request->active,
        ];

        $this->menu->handleEdit($UpdateData,$id);

        return redirect('admin/menu/list');
    }
    public function remove($id){
          $this->menu->remove($id);
        return redirect('admin/menu/list')->with('success','bạn đã xóa thành công');
    }
}
