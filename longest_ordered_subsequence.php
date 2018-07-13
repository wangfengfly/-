<?php
/**
 * Author: wangfeng
 * Date: 2018/7/13
 * Time: 10:27
 * 求数组的最长的子序列长度，子序列可以不连续
 * O(n^2)
 *
 */

function longest($data){
    if(!$data){
        return 0;
    }
    $n = count($data);
    $dp = [];
    $dp[0] = 1;
    for($i=1; $i<$n; $i++){
        $max = 1;
        for($j=0; $j<$i; $j++){
            if($data[$j] < $data[$i]){
                $max = max($max, $dp[$j]+1);
            }
        }
        $dp[$i] = $max;
    }

    return max($dp);
}

var_dump(longest([3, 10, 2, 1, 20]));
var_dump(longest([50, 3, 10, 7, 40, 80]));
var_dump(longest([1,2,3,4,5,6]));
var_dump(longest([6,5,4,3,2,1]));