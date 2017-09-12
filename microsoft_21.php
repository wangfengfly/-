<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/9/12
 * Time: 18:41
 * 输入两个整数n 和m，从数列1，2，3.......n 中随意取几个数，使其和等于m，要求将其中所有的可能组合列出来。
 */
$res = array();

function func($sum, $n){
    global $res;
    if($sum<=0 || $n<=0){
        return;
    }
    if($sum == $n){
        for($i=0; $i<count($res); $i++){
            echo $res[$i].' ';
        }
        echo $n.PHP_EOL;
    }
    array_push($res, $n);
    func($sum-$n, $n-1);
    array_pop($res);
    func($sum, $n-1);
}

func(5, 5);