<?php
/**
 * Author: wangfeng
 * Date: 2018/7/4
 * Time: 14:46
 * 字符串数组的最长公共前缀
 * 分治法O(mn)
 * n是数组大小，m是字符串长度
 *
 */

function common(array $arr, $l, $h){
    if(!$arr){
        return null;
    }
    if($l >= $h){
        return $arr[$l];
    }
    $m = floor($l+($h-$l)/2);
    $left = common($arr, $l, $m);
    $right = common($arr, $m+1, $h);
    $len = min(strlen($left), strlen($right));
    $prefix = '';
    for($i=0; $i<$len; $i++){
        if($left[$i] == $right[$i]){
            $prefix .= $left[$i];
        }else{
            break;
        }
    }
    return $prefix;
}

$arr = ['geeksforgeeks','geeks','geek','geezer'];
var_dump(common($arr, 0, count($arr)-1));

$arr = ['apple','ape','april'];
var_dump(common($arr, 0, count($arr)-1));
