<?php
/**
 * Author: wangfeng
 * Date: 2018/1/9
 * Time: 10:48
 * 找出两个有序数组合并以后的第k个元素
 */

/*
 * log(m+n)
 */
function find($k, $arr1, $l1, $h1, $arr2, $l2, $h2){
    if($k <= 0){
        return;
    }
    $m1 = floor(($l1+$h1)/2);
    $m2 = floor(($l2+$h2)/2);
    if($m1+$m2+2 < $k){
        find($k-$m1-$m2-2, $arr1, $m1+1, $h1, $arr2, $m2+1, $h2);
    }else if($m1+$m2+2 == $k){
        if($arr1[$m1]>$arr2[$m2]){
            return $arr1[$m1];
        }else{
            return $arr2[$m2];
        }
    }else{
        find($k, $arr1, 0, $m1, $arr2, 0, $m2);
    }
}

$arr1 = array(2, 3, 6, 7, 9);
$arr2 = array(1, 4, 8, 10);
var_dump(find(5, $arr1, 0, count($arr1)-1, $arr2, 0, count($arr2)-1));