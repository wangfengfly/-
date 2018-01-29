<?php
/**
 * Author: wangfeng
 * Date: 2018/1/29
 * Time: 10:31
 */

function heapify(array &$arr, $i, $n){
    $left = 2*$i+1;
    $right = 2*$i+2;
    $largest = $i;
    if($left<$n && $arr[$left]>$arr[$largest]){
        $largest = $left;
    }
    if($right<$n && $arr[$right]>$arr[$largest]){
        $largest = $right;
    }
    if($largest!=$i){
        list($arr[$i], $arr[$largest]) = array($arr[$largest], $arr[$i]);
        heapify($arr, $largest, $n);
    }
}

function mySort(array &$arr){
    if(!$arr){
        return;
    }
    $n = count($arr);
    for($i=floor($n/2)-1; $i>=0; $i--){
        heapify($arr, $i, $n);
    }

    for($i=$n-1; $i>=0; $i--){
        list($arr[0], $arr[$i]) = array($arr[$i], $arr[0]);
        heapify($arr, 0, $i);
    }
}


$arr = array(6,2,7,3,1,5);
var_dump($arr);
mySort($arr);
var_dump($arr);

$arr = array(1,2,3,4,5,6,7);
var_dump($arr);
mySort($arr);
var_dump($arr);