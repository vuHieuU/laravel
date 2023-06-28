<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class customer extends Model
{
    use HasFactory;
    protected $table =  'customers';
    protected $fillable = [
        'name',
        'phone',
        'addess',
        'email',
        'content',
    ];
    public function list(){
       return DB::table($this->table)->get();
    }
   
}
