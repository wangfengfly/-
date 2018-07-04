<?php
/**
 * Author: wangfeng
 * Date: 2018/7/4
 * Time: 10:31
 * 求一个数组的最大子数组和
 * 分治法
 * O(nlgn)
 * T(n)=2*T(n/2)+O(n)
 */

function submax($arr, $l, $h){
    if($l >= $h){
        return $arr[$l];
    }

    $mid = floor($l+($h-$l)/2);
    $lsum = $arr[$mid];
    for($i=$mid-1; $i>=$l; $i--){
        if($lsum+$arr[$i] > $lsum){
            $lsum = $lsum+$arr[$i];
        }
    }
    $rsum = $arr[$mid+1];
    for($i=$mid+2; $i<=$h; $i++){
        if($rsum+$arr[$i] > $rsum){
            $rsum = $rsum+$arr[$i];
        }
    }

    return max(submax($arr, $l, $mid-1), submax($arr, $mid+1, $h), $lsum+$rsum);
}

$arr = [-2,-5,6,-2,-3,1,5,-6];
var_dump(submax($arr, 0, count($arr)-1));

$arr = [2, 3, 4, 5, 7];
var_dump(submax($arr, 0, count($arr)-1));