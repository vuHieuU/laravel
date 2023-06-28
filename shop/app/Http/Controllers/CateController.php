<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\Product;

use Illuminate\Http\Request;

class CateController extends Controller
{
    protected $menu;
    protected $Product;
    public function __construct()
    {
        $this->menu = new menu;
        $this->Product = new Product;
    }

    public function index($menu_id){
        $title = 'Danh mục sản phẩm';
        $menus = $this->menu->getMenuHome();
        $listDataCate = $this->Product->listDataCate($menu_id);
           return view('menu',compact('menus','listDataCate','title'));
    }
}
