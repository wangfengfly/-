<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/26
 * Time: 14:25
 * 给定一个无序 整数数组，求出逆转元素对。
 */

function merge(&$arr, $left, $mid, $right){
    $temp = array();
    $i = $left;
    $j = $mid+1;
    $k = $left;
    $inv = 0;
    while($i<=$mid && $j<=$right){
        if($arr[$i] <= $arr[$j]){
            $temp[$k++] = $arr[$i++];
        }else{
            $temp[$k++] = $arr[$j++];
            $inv += ($mid-$i+1);
        }
    }
    while($i<=$mid){
        $temp[$k++] = $arr[$i++];
    }
    while($j<=$right){
        $temp[$k++] = $arr[$j++];
    }
    return $inv;
}

function inversions(array &$arr, $left, $right){
    if(!$arr){
        return;
    }
    $inv = 0;
    if($left < $right){
        $mid = $left + floor(($right-$left)/2);
        $inv = inversions($arr, $left, $mid);
        $inv += inversions($arr, $mid+1, $right);
        $inv += merge($arr, $left, $mid, $right);

    }
    return $inv;
}

$arr = array(1, 20, 6, 4, 5);
var_dump(inversions($arr, 0, count($arr)-1));