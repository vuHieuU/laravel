<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    public function listData(){
        return DB::table($this->table)->get();
    }
    public function store($data){
        return DB::table($this->table)->insert($data);
    }
    public function edit($id){
        return DB::table($this->table)->where('id',$id)->get();
    }
    public function handleUpdate($data,$id){
        return DB::table($this->table)->where('id',$id)->update($data);
    }
    public function remove($id){
        return DB::table($this->table)->where('id',$id)->delete();
    }
}
