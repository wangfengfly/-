<?php
/**
 * Author: wangfeng
 * Date: 2017/12/26
 * Time: 15:18
 * 判断一个数组中是否包含和为零的子数组
 */

function find(array $arr){
    if(!$arr){
        return false;
    }

    $n = count($arr);
    $sum = 0;
    $hash = array();
    for($i=0; $i<$n; $i++){
        $sum += $arr[$i];
        if(isset($hash[$sum])){
            return true;
        }
        $hash[$sum] = 1;
    }
    return false;
}

var_dump(find(array(4, 2, -3, 1, 6)));
var_dump(find(array(-3, 2, 3, 1, 6)));
var_dump(find(array(4, 2, 0, 1, 6)));