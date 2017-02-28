<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/2/28
 * Time: 15:15
 * 判断一个整数数组能否找到两个子集，和相同
 */
//递归实现
function partition($arr, $start, $sum){
    if($start >= count($arr)){
        return false;
    }
    if($sum == 0){
        return true;
    }
    if($sum < $arr[$start]){
        return partition($arr, $start+1, $sum);
    }
    return partition($arr, $start+1, $sum-$arr[$start]) || partition($arr, $start+1, $sum);
}

function is_partitioned($arr){
    $sum = array_sum($arr); //O(n)
    if($sum % 2 != 0){
        return false;
    }
    $len = count($arr);
    return partition($arr, 0, $sum/2);
}
/*
 * 动态规划实现
 * dp[i][j]表示长度为j的数组是否存在和为i的子集
 */
function is_partitioned_dp($arr){
    $dp = array();
    $len = count($arr);
    $sum = array_sum($arr);
    if($sum%2 != 0){
        return false;
    }
    for($i=0; $i<= $len; $i++){
        $dp[0][$i] = true;
    }
    for($i=0; $i<=$sum/2; $i++){
        $dp[$i][0] = false;
    }
    for($i=1; $i<=$sum/2; $i++){
        for($j=1; $j<=$len; $j++){
            $dp[$i][$j] = $dp[$i][$j-1];
            if($i >= $arr[$j-1]){
                $dp[$i][$j] = $dp[$i][$j] || $dp[$i-$arr[$j-1]][$j-1];
            }
        }
    }
    return $dp[$sum/2][$len];
}

function is_partitioned_dp2($arr){
    $dp = array();
    $len = count($arr);
    $sum = array_sum($arr);
    if($sum%2 != 0){
        return false;
    }
    for($i=0; $i<=$len; $i++){
        $dp[$i][0] = true;
    }
    for($i=0; $i<=$sum/2; $i++){
        $dp[0][$i] = false;
    }
    for($i=1; $i<=$sum/2; $i++){
        for($j=1; $j<=$len; $j++){
            $dp[$j][$i] = $dp[$j-1][$i];
            if($i >= $arr[$j-1]){
                $dp[$j][$i] = $dp[$j][$i] || $dp[$j-1][$i-$arr[$j-1]];
            }
        }
    }
    return $dp[$len][$sum/2];
}

$arr = array(3, 1, 1, 2, 2, 1,7);
//var_dump(is_partitioned($arr));
var_dump(is_partitioned_dp2($arr));
