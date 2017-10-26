<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/26
 * Time: 15:21
 */

function merge(&$arr, $left, $mid, $right){
    $tmp = array();
    $i = $left;
    $j = $mid+1;
    $k = $left;
    while ($i <= $mid && $j <= $right) {
        if ($arr[$i] < $arr[$j]) {
            $tmp[$k] = $arr[$i];
            $k++;
            $i++;
        } else {
            $tmp[$k] = $arr[$j];
            $k++;
            $j++;
        }
    }
    while ($i <= $mid) {
        $tmp[$k++] = $arr[$i++];
    }
    while ($j <= $right) {
        $tmp[$k++] = $arr[$j++];
    }
    for ($i = $left; $i <= $right; $i++) {
        $arr[$i] = $tmp[$i];
    }
    unset($tmp);
}

function mergesort(&$arr, $left, $right){
    if(!$arr){
        return;
    }
    if($left < $right){
        $mid = $left + floor(($right-$left)/2);
        mergesort($arr, $left, $mid);
        mergesort($arr, $mid+1, $right);
        merge($arr, $left, $mid, $right);
    }
}

$arr = array(4,2,8,1,3,5);
mergesort($arr, 0, count($arr)-1);
var_dump($arr);

$arr = array(10,9,3,6,1);
mergesort($arr, 0, count($arr)-1);
var_dump($arr);