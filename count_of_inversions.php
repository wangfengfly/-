<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/10
 * Time: 15:24
 * 给定一个无序数组，计算倒序元组数，
 * 比如数组2, 4, 1, 3, 5 有三个倒序元组 (2, 1), (4, 1), (4, 3).
 * 时间复杂度O(nlogn)
 * 空间复杂度O(n)
 */
function topdown($arr, $left, $right){
    if($right-$left==0){
        return;
    }
    $mid = floor(($left+$right)/2);
    $inv_count = topdown($arr, $left, $mid);
    $inv_count += topdown($arr, $mid+1, $right);
    $inv_count += inversions($arr, $left, $mid, $right);
    return $inv_count;
}

function inversions(&$arr, $left, $mid, $end){
    if($arr==null || $left>$end){
        return 0;
    }
    $res = array();
    $i = $left;
    $j = $mid+1;
    $inv_count = 0;
    while($i<$mid+1 && $j<=$end){
        if($arr[$i]<$arr[$j]){
            $res[] = $arr[$i];
            $i++;
        }else{
            $res[] = $arr[$j];
            $inv_count += $mid-$i+1;
            $j++;
        }
    }
    while($i<$mid+1){
        $res[] = $arr[$i];
        $i++;
    }
    while($j<=$end){
        $res[] = $arr[$j];
        $j++;
    }
    array_splice($arr, $left, $end-$left+1, $res);
    return $inv_count;
}

$arr = array(1, 20, 6, 4, 5);
$res = topdown($arr, 0, count($arr)-1);
echo $res.PHP_EOL;