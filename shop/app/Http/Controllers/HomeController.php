<?php

namespace App\Http\Controllers;
use App\Models\menu;
use App\Models\Product;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $menu;
    protected $Product;
    public function __construct()
    {
        $this->menu = new menu;
        $this->Product = new Product;
    }

    public function index(){
        $menus = $this->menu->getMenuHome();
        $dataHome = $this->Product->listDataHome();
        return view('home',compact('menus','dataHome'));
    }
}
