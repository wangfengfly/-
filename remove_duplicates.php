<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/6/26
 * Time: 18:09
 * 给定一个有序数组，删除其中重复的元素
 */

function remove_dup(&$arr){
    $n = count($arr);
    if($arr==null || $n<=0){
        return -1;
    }
    $j=0;
    for($i=0; $i<$n-1; $i++){
        if($arr[$i]!=$arr[$i+1]){
            $arr[$j] = $arr[$i];
            $j++;
        }
    }
    return $j;
}

$arr = array(1, 2, 2, 3, 4, 4, 4, 5, 5);
$n = remove_dup($arr);
for($i=0;$i<$n;$i++){
    echo $arr[$i].' ';
}