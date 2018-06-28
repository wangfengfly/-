<?php
/**
 * Author: wangfeng
 * Date: 2018/6/28
 * Time: 14:41
 * 计算数组中最大子数组乘积
 */

function max_product(array $arr){
    if(!$arr){
        return;
    }
    $min = [];
    $max= [];
    $min[0] = $arr[0];
    $max[0] = $arr[0];

    $n = count($arr);
    for($i=1; $i<$n; $i++){
        if($min[$i-1] > $max[$i-1]){
            $temp = $max[$i-1];
            $max[$i-1] = $min[$i-1];
            $min[$i-1] = $temp;
        }

        if($arr[$i] < 0){
            $min[$i] = min($arr[$i], $arr[$i]*$max[$i-1]);
            $max[$i] = max($arr[$i], $arr[$i]*$min[$i-1]);
        }else{
            $min[$i] = min($arr[$i], $arr[$i]*$min[$i-1]);
            $max[$i] = max($arr[$i], $arr[$i]*$max[$i-1]);
        }
    }

    return max($max);
}

var_dump(max_product([-1, -3, -10, 0, 60]));
var_dump(max_product([6, -3, -10, 0, 2]));
var_dump(max_product([1,2,3,4,5]));
var_dump(max_product([-1,-2,-3,0]));
var_dump(max_product([-1,-2,-1,-3,-4]));