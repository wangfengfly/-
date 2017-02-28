<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/2/28
 * Time: 14:04
 * Given an array which is sorted, but after sorting some elements are moved to either of the adjacent positions,
 * i.e., arr[i] may be present at arr[i+1] or arr[i-1]. Write an efficient function to search an element in this array.
 * Basically the element arr[i] can only be swapped with either arr[i+1] or arr[i-1].
 */

function find_element($arr, $l, $h, $x){
    if($l > $h){
        return -1;
    }
    $mid = ($l+$h)/2;
    if($mid - 1 >= $l && $arr[$mid-1] == $x){
        return $mid - 1;
    }
    if($mid + 1 <= $h && $arr[$mid+1] == $x){
        return $mid + 1;
    }
    if($arr[$mid] == $x){
        return $mid;
    }else if($arr[$mid] > $x){
        return find_element($arr, $l, $mid-1, $x);
    }else{
        return find_element($arr, $mid+1, $h, $x);
    }

}

$x = 90;
$arr = array(10, 3, 40, 20, 50, 80, 70);
echo find_element($arr, 0, count($arr)-1, $x) . PHP_EOL;