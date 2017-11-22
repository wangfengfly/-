<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/22
 * Time: 10:45
 * 不通过比较数组的元素，找出数组中的最大值
 */

/*
 * O(n*max)
 */
function findmax(array $arr){
    if(!$arr || count($arr)==0){
        return;
    }
    $n = count($arr);
    if($n == 1){
        return $arr[0];
    }
    $max = my_max($arr[0], $arr[1]);
    for($i=2; $i<$n; $i++){
        $max = my_max($max, $arr[$i]);
    }
    return $max;
}

function my_max($x, $y){
    $max = 0;
    while($x>0 || $y>0){
        $x--;
        $y--;
        $max++;
    }
    return $max;
}

$arr = array(2, 3, 1, 4, 5);
var_dump(findmax($arr));
$arr = array(23, 17, 93);
var_dump(findmax($arr));