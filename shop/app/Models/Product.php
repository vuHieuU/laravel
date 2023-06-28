<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function listData(){
         return DB::table($this->table)->paginate(5);
    }
    public function listDataHome(){
        return DB::table($this->table)->get();
    }
    public function listDataCate($menu_id){
        return DB::table($this->table)->where('menu_id',$menu_id)->get();
    }
    public function DetailProduct($id){
        return DB::table($this->table)->where('id',$id)->get();
    }
    public function DetailProductCate($id){
        $product = DB::table($this->table)->where('id', $id)->first(); // Lấy ra thông tin sản phẩm hiện tại
        return DB::table($this->table)
            ->where('id', '!=', $id) // Loại trừ sản phẩm hiện tại
            ->where('menu_id', $product->menu_id) // Lấy các sản phẩm cùng menu_id với sản phẩm hiện tại
            ->limit(8)
            ->get();
    }
    
    
    public function store($data){
          return DB::table($this->table)->insert($data);
    }
    public function remove($id){
        return DB::table($this->table)->where('id',$id)->delete();
    }
    public function edit($id){
        return DB::table($this->table)->where('id',$id)->get();
    }
    public function handleEdit($data,$id){
        return DB::table($this->table)->where('id',$id)->update($data);
    }

}
