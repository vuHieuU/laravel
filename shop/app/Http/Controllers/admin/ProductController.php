<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
//    const _PER_PAGE = 3;
    public function __construct()
    {
        $this->product = new product;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách sản phẩm';
        $listData = $this->product->listData();
        return view('admin.product.list',compact('title','listData'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm sản phẩm';
        $getAdd = getAllMenu();
        return view('admin.product.add',compact('title','getAdd'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'thumb'=>'required',
        ]);
        $insertData = [
            'name'=>$request->name,
            'menu_id'=>$request->menu_id,
            'description'=>$request->description,
            'content'=>$request->content,
            'price'=>$request->price,
            'price_sale'=>$request->price_sale,
            'active'=>$request->active,
            'thumb'=>$request->thumb,
        ];

        $this->product->store($insertData);

        return redirect('admin/product/add')->with('success','Bạn đã thêm thành công');
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Trang chỉnh sửa sản phẩm';
        $getAdd = getAllMenu();
        $DataEdit = $this->product->edit($id);
        $DataEdit = $DataEdit[0];
        return view('admin.product.edit',compact('title','DataEdit','getAdd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id=0){
        $request->validate([
            'name'=>'required',
            'thumb'=>'required',
        ]);
        $insertData = [
            'name'=>$request->name,
            'menu_id'=>$request->menu_id,
            'description'=>$request->description,
            'content'=>$request->content,
            'price'=>$request->price,
            'price_sale'=>$request->price_sale,
            'active'=>$request->active,
            'thumb'=>$request->thumb,
        ];


        $this->product->handleEdit($insertData,$id);

        return redirect('admin/product/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->product->remove($id);
        return redirect('/admin/product/list');
    }
}
