<?php

namespace App\Http\Controllers;

use App\Http\Services\cartServices;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartServices;
    public function __construct(cartServices $cartServices){
        $this->cartServices = new cartServices;
    }

    public function index(Request $request){
       $result = $this->cartServices->create($request);
        if($result === false){
              return redirect()->back();
        }
        return redirect('/cart');
    }
    public function show(){
        $title = 'Giỏ hàng';
        $product = $this->cartServices->getProduct();
        $carts = Session::get('carts');
        return view('carts.list',compact('title','product','carts'));
    }
    public function update(Request $request){
        // dd($request->all());
           $this->cartServices->updateCart($request);
           return redirect('/cart');
    }
    public function remove($id){
        $this->cartServices->removeId($id);
        return redirect('/cart');
    }
    public function addCart(Request $request){
          $this->cartServices->addCart($request);
          return redirect()->back();
    }
}
