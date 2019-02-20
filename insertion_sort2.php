<?php
/**
 * Author: wangfeng
 * Date: 2019/2/20
 * Time: 11:51
 * 插入排序
 */

function insertion_sort(array &$arr){
    if(!$arr){
        return;
    }

    $n = count($arr);
    for($i=1; $i<$n; $i++){
        $temp = $arr[$i];
        for($j=$i-1; $j>=0; $j--){
            if($temp < $arr[$j]){
                $arr[$j+1] = $arr[$j];
            }else{
                break;
            }
        }
        $arr[$j+1] = $temp;
    }
}


$data = [23, 21, 6, 90];
insertion_sort($data);
var_dump($data);

$data = [98, 90, 32, 21];
insertion_sort($data);
var_dump($data);

$data = [1];
insertion_sort($data);
var_dump($data);

$data = [10, 9, 8, 7];
insertion_sort($data);
var_dump($data);