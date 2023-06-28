<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;

class CustomerController extends Controller
{
    protected $customer;
    public function __construct(){
        $this->customer = new customer;
    }
    public function index(){
        $title = 'Danh sách khách hàng';
        $customer = $this->customer->list();
         return view('admin.cart.list',compact('title','customer'));
    }
}
