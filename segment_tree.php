<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/1
 * Time: 10:06
 * 线段树用数组表示，节点i的左节点2*i+1, 节点i的右节点2*i+2
 * 构造线段树
 */

function build($arr, $l, $h, $i, &$tree){
    if($l == $h){
        $tree[$i] = $arr[$l];
        return $arr[$l];
    }
    $mid = $l + floor(($h-$l)/2);
    $tree[$i] = build($arr, $l, $mid, 2*$i+1, $tree) + build($arr, $mid+1, $h, 2*$i+2, $tree);
    return $tree[$i];
}

$arr = array(1,3,5,7,9,11);
$tree = array();
build($arr, 0, count($arr)-1, 0, $tree);

var_dump($tree);