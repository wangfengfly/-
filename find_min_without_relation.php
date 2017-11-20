<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/20
 * Time: 16:38
 * 不通过元素之间的比较，找到数组中的最小值
 */

function find_min(array $arr){
    if(!$arr){
        return;
    }
    $n = count($arr);
    if($n == 1){
        return $arr[0];
    }
    $x = $arr[0];
    $y = $arr[1];
    $min = my_min($x, $y);
    for($i=2; $i<$n; $i++){
        $min = my_min($min, $arr[$i]);

    }
    return $min;
}

function my_min($x, $y){
    $c = 0;
    while($x>0 && $y>0){
        $x--;
        $y--;
        $c++;
    }
    return $c;
}

$arr = array(2, 3, 1, 4, 5);
var_dump(find_min($arr));

$arr = array(23, 17, 93);
var_dump(find_min($arr));