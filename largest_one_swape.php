<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/15
 * Time: 16:55
 * 给定一个正整数，最多只允许交换一次其中的两个数字，求可以得到的最大数
 */

function largest($num){
    $num = strval($num);
    $max_digit = '';
    $max_digit_idx = '';
    $len = strlen($num);
    $l = -1;
    $r = -1;
    for($i=$len-1; $i>=0; $i--){
        if($num[$i] > $max_digit){
            $max_digit = $num[$i];
            $max_digit_idx = $i;
        }else if($num[$i] < $max_digit){
            $l = $i;
            $r = $max_digit_idx;
        }
    }
    if($l == -1){
        return intval($num);
    }
    $temp = $num[$l];
    $num[$l] = $num[$r];
    $num[$r] = $temp;
    return intval($num);
}

var_dump(largest(789));
var_dump(largest(987));
var_dump(largest(9675));
var_dump(largest(7695));