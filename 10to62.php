<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/26
 * Time: 10:47
 */

$base = array();
for($i=0; $i<26; $i++){
    $base[] = chr($i+ord('a'));
}

for($i=0; $i<26; $i++){
    $base[] = chr($i+ord('A'));
}
for($i=0; $i<10; $i++){
    $base[] = $i;
}

$reverse_base = array();
foreach($base as $k=>$v){
    $reverse_base[$v] = $k;
}
/*
 * 10进制转换成62进制
 */
function conversion10_62($n){
    global $base;
    $res = '';
    while($n){
        $mod = $n%62;
        $res = $base[$mod].$res;
        $n = ($n-$mod)/62;
    }
    return $res;
}
/*
 * 62进制转换10进制
 */
function conversion62_10($n){
    global $reverse_base;
    $res = 0;
    $len = strlen($n);
    for($i=$len-1; $i>=0; $i--){
        $res = $res + $reverse_base[$n[$i]]*pow(62, $len-1-$i);
    }
    return $res;
}

function conversion62_10_without_reversebase($n){
    $res = 0;
    $len = strlen($n);
    for($i=0; $i<$len; $i++){
        $c = $n[$i];
        if($c>='a' && $c<='z'){
            $res = $res*62+ord($c)-ord('a');
        }else if($c>='A' && $c<='Z'){
            $res = $res*62 + ord($c) - ord('A') + 26;
        }else if($c>='0' && $c<='9'){
            $res = $res*62 + ord($c) - ord('0') + 52;
        }
    }
    return $res;
}

$res = conversion10_62(12345);
var_dump($res);
$res = conversion62_10($res);
var_dump($res);

$res = conversion10_62(12345);
var_dump($res);
$res = conversion62_10_without_reversebase($res);
var_dump($res);

$res = conversion10_62(123456);
var_dump($res);
$res = conversion62_10($res);
var_dump($res);

$res = conversion10_62(123456);
var_dump($res);
$res = conversion62_10_without_reversebase($res);
var_dump($res);