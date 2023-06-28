<?php

namespace App\Models;

use http\Env\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class menu extends Model
{
    use HasFactory;
    protected $table = "menus";
    public function create($data){
          return DB::table($this->table)->insert($data);
    }
    public function getParentId(){
          return DB::table($this->table)->where('parent_id',0)->get();
    }
    public function getMenuHome(){
        return DB::table($this->table)->select('name','id')->where('parent_id',0)->get();
    }
    public function getData(){
        return DB::table($this->table)->get();
    }
    public function getAll(){
        return DB::table($this->table)
            ->orderBy('name','ASC')
            ->get();
    }
    public function showEdit($id){
        return DB::table($this->table)->where('id',$id)->get();
    }
    public function handleEdit($data,$id){
        return DB::table($this->table)->where('id',$id)->update($data);
    }
    public function remove($id){
        return DB::table($this->table)->where('id',$id)->delete();
    }
    public function getMenuOne($id){
        return DB::table($this->table)->select('name')->where('id',$id)->get();
    }

}
