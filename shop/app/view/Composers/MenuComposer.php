<?php

namespace App\View\Composers;

use App\Models\menu;
use Illuminate\View\View;
use DB;

class MenuComposer
{
    protected $table = "menus";
    public function __construct() {

    }
    public function compose(View $view): void
    {

        $menus =  DB::table($this->table)->select('id','name','parent_id')->where('active',1)->orderByDesc('id')->get();
        $view->with('menus', $menus);
    }
}
