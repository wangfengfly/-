<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/1
 * Time: 16:09
 */

$menus = array(
  array('id'=>1, 'name'=>'父菜单1', 'parentid'=>null),
  array('id'=>2, 'name'=>'子菜单1-1', 'parentid'=>1),
  array('id'=>4, 'name'=>'父菜单2', 'parentid'=>null),
  array('id'=>5, 'name'=>'子菜单2-1', 'parentid'=>4),
  array('id'=>6, 'name'=>'子菜单2-2', 'parentid'=>4),
  array('id'=>7, 'name'=>'子菜单2-3', 'parentid'=>4),
  array('id'=>8, 'name'=>'父菜单3', 'parentid'=>null),
  array('id'=>9, 'name'=>'子菜单3-1', 'parentid'=>8),
  array('id'=>10, 'name'=>'子菜单3-2', 'parentid'=>8),
    array('id'=>11, 'name'=>'子菜单1-1-1', 'parentid'=>2),
    array('id'=>12, 'name'=>'子菜单1-1-2', 'parentid'=>2),
    array('id'=>3, 'name'=>'子菜单1-2', 'parentid'=>1),
);
/*
 * 只能适用二级菜单
 */
function printMenus($menus){
    foreach($menus as $menu){
        if($menu['parentid']==null){
            echo $menu['name'].":\n";
            $parentid = $menu['id'];
            for($i=0; $i<count($menus); $i++){
                if($menus[$i]['parentid'] == $parentid){
                    echo '  '.$menus[$i]['name']."\n";
                }
            }
        }
    }
}

function hasChildren($menus, $id){
    foreach($menus as $menu){
        if($menu['parentid'] == $id){
            return true;
        }
    }
    return false;
}
/*
 * 任意级菜单
 */
function printMenus2($menus, $parentid, $i){
    foreach($menus as $menu){
        if($menu['parentid'] == $parentid){
            echo str_repeat("\t", $i).$menu['name']."\n";
            if(hasChildren($menus, $menu['id'])) {
                printMenus2($menus, $menu['id'], $i+1);
            }
        }
    }
}

//printMenus($menus);
printMenus2($menus, 0, 0);