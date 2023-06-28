<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class detailController extends Controller
{
    protected $Product;

    public function __construct(){
        $this->Product = new Product;
    }
    public function index($id){
        $DetailProduct = $this->Product->DetailProduct($id);
        $DetailProductCate = $this->Product->DetailProductCate($id);
        return view('ProductDetail',compact('DetailProduct','DetailProductCate'));
    }
    
}
