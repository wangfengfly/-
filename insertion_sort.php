<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/9
 * Time: 14:39
 * 插入排序
 * 最好情况下O(n)
 * 最坏情况下 O(n^2)
 */

function insertion_sort(&$arr){
    if($arr == null || count($arr)<=0){
        return $arr;
    }
    $n = count($arr);
    for($i=1; $i<$n; $i++){
        $j = $i;
        while($j>0 && $arr[$j-1]>$arr[$j]){
            $temp = $arr[$j-1];
            $arr[$j-1] = $arr[$j];
            $arr[$j]=$temp;
            $j--;
        }
    }
}

$arr = array(1,3,4,5,2,6);
insertion_sort($arr);
var_dump($arr);