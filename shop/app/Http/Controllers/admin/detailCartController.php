<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\customer;

class detailCartController extends Controller
{
    protected $cart;
    protected $customer;
    public function __construct(){
          $this->cart = new cart;
          $this->customer = new customer;
    }
  
    public function index($customer_id = 0){
        $title = 'Chi tiết giỏ hàng';
        $carts = $this->cart->list($customer_id);
        return view('admin.cart.detailCart',compact('title','carts'));
    }
}
