<?php
/**
 * Author: wangfeng
 * Date: 2018/7/4
 * Time: 14:21
 * divide and conquer
 * 计算x的n次方
 * O(lgn)
 */

function power($x, $n){
    if($n == 0){
        return 1;
    }
    if($n == 1){
        return $x;
    }
    if($n%2 == 0){
        $t = power($x, $n/2);
        return $t*$t;
    }else{
        $t = power($x, ($n-1)/2);
        return $t*$t*$x;
    }
}

var_dump(power(2,3));
var_dump(power(2,6));
var_dump(power(2,0));