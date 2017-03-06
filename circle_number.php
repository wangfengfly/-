<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/6
 * Time: 14:46
 * n个人站成一个环，编号从1开始。从1开始报数，报到r的人退出
 * 求最后留下的人的编号
 */

function num($n, $r){
    $res = array();
    for($i=0; $i<$n; $i++){
        $res[$i+1] = 1;
    }
    $out = 0;
    $k = 0;
    $i = 1;
    //$out 是退出的人数
    while($out < $n-1){
        if($res[$i]){
            $k++;
        }
        //退出时将某个人置为0
        if($k == $r){
            $res[$i] = 0;
            $k = 0;
            $out+=1;
        }
        $i++;
        //环形
        if($i > $n){
            $i = 1;
        }
    }
    for($i=1;$i<=$n;$i++){
        if($res[$i]){
            return $i;
        }
    }
    return -1;
}

$res = num(9, 3);
var_dump($res);