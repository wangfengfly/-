<?php
/**
 * Author: wangfeng
 * Date: 2018/7/12
 * Time: 10:17
 * 计算两个字符串的编辑距离
 */

/**
 * @param $str1
 * @param $str2
 * @param $m
 * @param $n
 * @return mixed
 * 从最后一个字符开始
 *
 */
function dist1($str1, $str2, $m, $n){
    if($m == 0){
        return $n;
    }
    if($n == 0){
        return $m;
    }
    if($str1[$m-1] == $str2[$n-1]){
        return dist1($str1, $str2, $m-1, $n-1);
    }else{
        return min(dist1($str1, $str2, $m, $n-1),
            dist1($str1, $str2, $m-1, $n),
            dist1($str1, $str2, $m-1, $n-1)) + 1;
    }
}

/**
 * @param $str1
 * @param $str2
 * @param $m
 * @param $n
 * @param $s1
 * @param $s2
 * @return mixed
 * 从第一个字符开始
 */
function dist2($str1, $str2, $m, $n, $s1, $s2){
    if($m == 0){
        return $n;
    }
    if($n == 0){
        return $m;
    }
    if($str1[$s1] == $str2[$s2]){
        return dist2($str1, $str2, $m-1, $n-1, $s1+1, $s2+1);
    }else{
        return min(dist2($str1, $str2, $m, $n-1, $s1, $s2+1),
            dist2($str1, $str2, $m-1, $n, $s1+1, $s2),
            dist2($str1, $str2, $m-1, $n-1, $s1+1, $s2+1))+1;
    }
}

function dp_dist1($str1, $str2){
    $m = strlen($str1);
    $n = strlen($str2);
    $dp = [];
    for($i=0; $i<=$m; $i++){
        $dp[$i][0] = $i;
    }
    for($j=0; $j<=$n; $j++){
        $dp[0][$j] = $j;
    }
    for($i=1; $i<=$m; $i++){
        for($j=1; $j<=$n; $j++){
            if($str1[$i-1] == $str2[$j-1]){
                $dp[$i][$j] = $dp[$i-1][$j-1];
            }else{
                $dp[$i][$j] = min($dp[$i][$j-1], $dp[$i-1][$j], $dp[$i-1][$j-1]) + 1;
            }
        }
    }
    return $dp[$m][$n];
}




$str1 = 'sunday';
$str2 = 'saturday';
var_dump(dist1($str1, $str2, strlen($str1), strlen($str2)));
var_dump(dist2($str1, $str2, strlen($str1), strlen($str2), 0, 0));

var_dump(dp_dist1($str1, $str2));
