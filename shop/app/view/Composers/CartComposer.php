<?php

namespace App\View\Composers;

use DB;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CartComposer
{
    public function __construct() {

    }
    public function compose(View $view)
    {
        $carts = Session::get('carts'); 
        if(is_null($carts)) return [];
        $productId = array_keys($carts);
         $product =  Product::select('id','name','price','price_sale','thumb')
        ->where('active' , 1)
        ->whereIn('id',$productId) 
        ->get();

        
        $view->with('product', $product);
    }
}
