<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/3
 * Time: 14:10
 * 给定一个数组，求出所有子数组的和的和
 */
/*
 * 可以求出所有子数组，再计算子数组的和
 * 每个元素在所有子数组中都出现2^(n-1)次
 */
function sum_total($arr){
    $sum = 0;
    $n = count($arr);
    for($i=0; $i<$n; $i++){
        $sum += $arr[$i];
    }
    return $sum * pow(2, $n-1);
}

$arr = array(6,7,8);
echo sum_total($arr) . PHP_EOL;