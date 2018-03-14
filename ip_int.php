<?php
/**
 * Author: wangfeng
 * Date: 2018/3/14
 * Time: 14:33
 * ip地址和整型之间的互相转换
 */

function ip2int($ip){
    $ip_arr = explode('.', $ip);
    if(count($ip_arr) != 4){
        return false;
    }
    $int = 0;
    for($i=3; $i>=0; $i--){
        $int += intval($ip_arr[$i])*(1<<(8*(3-$i)));
    }
    return $int;
}

function int2ip($int){
    $ip = array();
    for($i=3; $i>=0; $i--){
        $t = 1<<(8*$i);
        $v = intval($int/$t);
        $ip[] = $v;
        $int = $int - $v*$t;
    }
    return implode('.', $ip);
}

$int = ip2int('127.0.0.1');
var_dump($int);
var_dump(int2ip($int));

$int = ip2int('192.255.255.16');
var_dump($int);
var_dump(int2ip($int));

$int = ip2int('170.255.255.16');
var_dump($int);
var_dump(int2ip($int));