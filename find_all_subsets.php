<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/6
 * Time: 13:28
 * 打印数组的所有子数组
 */

function all_subsets($arr, $i, &$res, $index, $r){
    $n = count($arr);
    if($index == $r){
        var_dump($res);
        return;
    }
    if($i == $n){
        return;
    }
    $res[$index] = $arr[$i];
    all_subsets($arr, $i+1, $res, $index+1, $r);
    all_subsets($arr, $i+1, $res, $index, $r);
}

$arr=array('a','b','c');
$res = array();
for($l=1;$l<=count($arr); $l++) {
    all_subsets($arr, 0, $res, 0, $l);
}