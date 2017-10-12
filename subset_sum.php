<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/12
 * Time: 15:21
 * 子集和，给定一个整数数组和整数sum
 * 判断该数组是否存在子集，子集和等于sum
 */

function solve(array $arr, $i, $k, $sum){
    if($k==$sum){
        return true;
    }
    $n = count($arr);
    if($i>=$n || $k>$sum){
        return false;
    }

    if(solve($arr, $i+1, $k+$arr[$i], $sum)){
        return true;
    }
    if(solve($arr, $i+1, $k, $sum)){
        return true;
    }
    return false;
}

$arr = array(10, 7, 5, 18, 12, 20, 15);
var_dump(solve($arr, 0, 0, 25));