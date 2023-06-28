<?php
namespace App\Helpers;

use Illuminate\Support\Str;


class helper{



    public static function menus($menus,$parent_id = 0){
         $html = '';
         foreach ($menus as $key => $menu) {
             if ($menu->parent_id == $parent_id) {
                      $html .='
                      <li>
                         <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name ,'-').'.html">
                             '.$menu->name.'
                         </a>';
                      if(self::isChild($menus, $menu->id)){
                          $html .= '<ul class="sub-menu">';
                          $html .= self::menus($menus, $menu->id);
                          $html .= '</ul>';
                      }
                      $html .= '</li>
                      ';
             }
         }
         return $html;
    }
                public static function isChild($menus,$id ){


                        foreach($menus as $key => $menu){
                            if($menu->parent_id == $id){

                                return $menus;
                            }

                        }
                        return false;

    }

}
