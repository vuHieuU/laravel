<?php
use App\Models\menu;
    function getAllMenu(){
        $menu = new menu();
        return $menu->getAll();
}
