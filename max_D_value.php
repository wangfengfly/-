<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/17
 * Time: 9:35
 * 无序整型数组，求出排序后相邻元素的最大差值
 */

function find(array $arr){
    if(!$arr){
        return;
    }
    $min = $arr[0];
    $max = $arr[0];
    $n = count($arr);
    for($i=0; $i<$n; $i++){
        if($min > $arr[$i]){
            $min = $arr[$i];
        }
        if($max < $arr[$i]){
            $max = $arr[$i];
        }
    }
    $step = ceil(($max - $min)/$n);

    for($i=0; $i<floor($max/$step)+1; $i++){
        $range[$i] = array();
    }
    for($i=0; $i<$n; $i++){
        $index = floor($arr[$i]/$step);
        $range[$index][] = $arr[$i];
    }

    $data = array();
    for($i=0; $i<count($range); $i++){
        if(count($range[$i]) > 0){
            $data[] = $range[$i];
        }
    }

    $max_d = 0;
    //O(n)
    for($i=0; $i<count($data)-1; $i++){
        $max = max($data[$i]);
        $min = min($data[$i+1]);
        if($min - $max > $max_d){
            $max_d = $min - $max;
        }
    }
    return $max_d;
}

$arr = array(5,3,2,4,10,30);
var_dump(find($arr));