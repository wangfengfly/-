<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/6
 * Time: 13:57
 * 十进制转换成二进制
 */

function res($num){
    if($num == 0){
        $res = 0;
    }
    while($num){
        $res = $num%2 . $res;
        $num=floor($num/2);
        var_dump($num);
    }
    echo $res . PHP_EOL;
}

$num = 0;
res($num);