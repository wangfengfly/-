<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/3
 * Time: 11:35
 * 给定一个有序数组，找出某个元素首次和最后一次出现的位置
 * 时间复杂度O(lgn)
 */

function find($arr, $n, $l, $h, &$first, &$last){
    if($l > $h || $l<0 || $h>=count($arr)){
        return;
    }
    $mid = ceil(($l+$h)/2);
    if($arr[$mid] == $n){
        $first = min($first, $mid);
        $last = max($last, $mid);
        if($mid-1>=$l && $arr[$mid-1]==$n){
            find($arr, $n, $l, $mid-1, $first, $last);
        }
        if($mid+1<=$h && $arr[$mid+1]==$n){
            find($arr, $n, $mid+1, $h, $first, $last);
        }
    }else if($arr[$mid] > $n){
        find($arr, $n, $l, $mid-1, $first, $last);
    }else{
        find($arr, $n, $mid+1, $h, $first, $last);
    }

}

$arr = array(1, 2, 2, 2, 2, 3, 4, 7, 8, 8);
$n = 8;
$first = count($arr);
$last = -1;
find($arr, $n, 0, count($arr)-1, $first, $last);
echo "$n, $first:$last\n";