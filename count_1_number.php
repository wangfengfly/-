<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/9
 * Time: 10:55
 * 0-1数组降序排序，求1出现的次数
 * 时间复杂度O(logn)
 */

function count_total($arr, $l, $h){
    if($arr==null || count($arr)<=0 || $l>$h){
        return 0;
    }
    $mid = ceil(($l+$h)/2);
    if($arr[$mid] == 0){
        return count_total($arr, $l, $mid-1);
    }else if($arr[$mid] == 1){
        return count_total($arr, $l, $mid-1) + 1 + count_total($arr, $mid+1, $h);
    }
}

$arr = array(0,0,0);
$total = count_total($arr,0,count($arr)-1);
echo $total . PHP_EOL;