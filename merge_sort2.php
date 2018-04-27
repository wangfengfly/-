<?php
/**
 * Author: wangfeng
 * Date: 2018/4/27
 * Time: 10:34
 * 归并排序
 * 时间复杂度O(nlgn)
 */

function merge($arr1, $arr2){
    $n1 = count($arr1);
    $n2 = count($arr2);
    if($n1==0 && $n2==0){
        return;
    }else if($n1 == 0){
        return $arr2;
    }else if($n2 == 0){
        return $arr1;
    }

    $temp = array();
    $i = 0;
    $j = 0;
    $k = 0;
    while($i<$n1 && $j<$n2){
        if($arr1[$i] <= $arr2[$j]){
            $temp[$k] = $arr1[$i];
            $i++;
            $k++;
        }else{
            $temp[$k] = $arr2[$j];
            $j++;
            $k++;
        }
    }
    while($i<$n1){
        $temp[$k] = $arr1[$i];
        $i++;
        $k++;
    }
    while($j<$n2){
        $temp[$k] = $arr2[$j];
        $j++;
        $k++;
    }
    return $temp;
}


function merge_sort($arr, $left, $right){
    if($left == $right){
        return [$arr[$left]];
    }
    $mid = $left + floor(($right-$left)/2);
    $arr1 = merge_sort($arr, $left, $mid);
    $arr2 = merge_sort($arr, $mid+1, $right);
    return merge($arr1, $arr2);
}

$arr = array(4,3,5,2,1,6,7);
$arr = array(1,1,1,1,1);
$arr = [5,4,3,2,1];
$arr = [1,2,3,4,5];
var_dump(merge_sort($arr, 0, count($arr)-1));
