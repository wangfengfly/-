<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/7/20
 * Time: 14:55
 */
/*
 * 霍纳法则求y=a(n)*x^n+a(n-1)*x^(n-1)+...+a1x1+a0
 * 和传统的求法相比，只需要n次乘法和n次加法
 */
function compute($x, $arr){
    $n = count($arr);
    $y = $arr[$n-1];
    $i=$n-1;
    while($i>=1){
        $y=$y*$x+$arr[$i-1];
        $i--;
    }
    return $y;
}

$arr = array(7,6,-2,5,4);
$x = 1;
var_dump(compute($x, $arr));