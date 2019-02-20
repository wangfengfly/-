<?php
/**
 * Author: wangfeng
 * Date: 2019/2/20
 * Time: 10:33
 * 选择排序，每次选择余下的最小的和第一个元素交换
 */

function selection_sort(array &$arr){
    if(!$arr){
        return;
    }

    $n = count($arr);
    for($i=0; $i<$n; $i++){
        $min = $i;
        for($j=$i+1; $j<$n; $j++){
            if($arr[$j] < $arr[$min]){
                $min = $j;
            }
        }
        if($min != $i){
            $temp = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $temp;
        }
    }
}

$data = [1,1,1,1,1];
selection_sort($data);
var_dump($data);

$data = [23, 21, 6, 90];
selection_sort($data);
var_dump($data);

$data = [98, 90, 32, 21];
selection_sort($data);
var_dump($data);

$data = [1];
selection_sort($data);
var_dump($data);