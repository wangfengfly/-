<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/17
 * Time: 11:22
 * 给定一个无序数组，求出最长的连续数的子序列长度
 * Input  : arr[] = {1, 5, 92, 4, 78, 6, 7};
   Output : 4
 * {4,5,6,7}
 */

/*
 * O(m*n)
 * m是最长的连续子序列长度
 * n数组长度
 */
function find(array $arr){
    if(!$arr){
        return 0;
    }

    $max = 0;
    $hash = array();
    foreach($arr as $item){
        $hash[$item] = 1;
    }

    foreach($arr as $item){
        if(!isset($hash[$item-1])){
            $i = $item;
            while(isset($hash[$i])){
                $i++;
            }
            $max = max($max, $i-$item);
        }
    }
    return $max;
}

$arr = array(1, 94, 93, 1000, 5, 92, 78);
var_dump(find($arr));

$arr = array(1, 5, 92, 4, 78, 6, 7);
var_dump(find($arr));
