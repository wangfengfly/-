<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/16
 * Time: 18:33
 * 找出数组中最长的连续正数序列
 */

function longest(array $arr){
    if(!$arr){
        return;
    }
    $longest_idx = -1;
    $longest = 0;
    $len = 0;
    $n = count($arr);
    for($i=0; $i<$n; $i++){
        if($arr[$i]>0){
            $len++;
        }else{
            if($len>$longest){
                $longest = $len;
                $longest_idx = $i-$len;
            }
            $len=0;
        }
    }
    if($longest == 0){
        echo "No longest positive elements found\n";
    }else{
        echo "Index: $longest_idx, Length:$longest\n";
    }
}

$arr = array(1, 2, -3, 2, 3, 4, -6, 1,
    2, 3, 4, 5, -8, 5, 6);
longest($arr);

$arr = array(-3, -6, -1, -3, -8);
longest($arr);