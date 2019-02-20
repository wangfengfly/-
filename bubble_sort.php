<?php
/**
 * Author: wangfeng
 * Date: 2019/2/20
 * Time: 10:45
 * 冒泡排序
 */

function swap(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function bubble_sort(array &$arr){
    if(!$arr){
        return;
    }

    $n = count($arr);
    for($l=0; $l<$n; $l++){
        for($i=0; $i<$n-1-$l; $i++){
            if($arr[$i] > $arr[$i+1]){
                swap($arr[$i], $arr[$i+1]);
            }
        }
    }
}

$data = [1,1,1,1,1];
bubble_sort($data);
var_dump($data);

$data = [23, 21, 6, 90];
bubble_sort($data);
var_dump($data);

$data = [98, 90, 32, 21];
bubble_sort($data);
var_dump($data);

$data = [1];
bubble_sort($data);
var_dump($data);