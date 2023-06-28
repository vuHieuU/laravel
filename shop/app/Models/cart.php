<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
         'customer_id',
         'product_id',
         'pty',
         'price',
    ];
    public function list($customer_id){
          return DB::table($this->table)
          ->join('products','carts.product_id','=','products.id')
          ->join('customers','carts.customer_id','=','customers.id')
          ->select('products.name as namePro','products.thumb','carts.*','customers.*')
          ->where('customer_id',$customer_id)
          ->get();
    }
}
