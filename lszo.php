<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/17
 * Time: 11:03
 * 给定一个只包含0和1的数组，求出最大的子序列，使得该子序列包含相同的0和1
 * Input : arr[] = { 1, 0, 0, 1, 0, 0, 0, 1 }
   Output: 6
 * Input : arr[] = { 0, 0, 1, 1, 1, 1, 1, 0, 0 }
   Output : 8
 */

function find(array $arr){
    if(!$arr){
        return 0;
    }
    $n = count($arr);
    $zeros = 0;
    $ones = 0;
    for($i=0; $i<$n; $i++){
        if($arr[$i] == 0){
            $zeros++;
        }
        if($arr[$i] == 1){
            $ones++;
        }
    }
    return min($zeros, $ones)*2;
}

$arr = array(1, 0, 0, 1, 0, 0, 0, 1);
var_dump(find($arr));

$arr = array(0, 0, 1, 1, 1, 1, 1, 0, 0);
var_dump(find($arr));