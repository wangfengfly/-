<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/10
 * Time: 10:40
 */

/*
 * top-down的合并排序
 */
function split_sort(&$arr, $begin, $end){
    //先分解成大小为1的数组，有序
    if($arr == null || $end-$begin==0){
        return;
    }
    $mid = floor(($begin+$end)/2);
    split_sort($arr, $begin, $mid);
    split_sort($arr, $mid+1, $end);
    //将子数组arr[begin...mid] arr[mid+1...end]合并
    $res = merge($arr, $begin, $mid, $end);
    //替换掉原数组的对应部分
    array_splice($arr, $begin, $end-$begin+1, $res);
    return $arr;
}
/*
 * 进行实际的合并
 */
function merge($arr, $begin, $mid, $end){
    $res = array();
    $i = $begin;
    $j = $mid+1;
    while($i<$mid+1 && $j<=$end){
        if($arr[$i]<$arr[$j]){
            $res[] = $arr[$i];
            $i++;
        }else{
            $res[] = $arr[$j];
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
    return $res;
}

$arr = array(1,6,5,2,9,3,11);
$arr = split_sort($arr, 0, count($arr)-1);
var_dump($arr);