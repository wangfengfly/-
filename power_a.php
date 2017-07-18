<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/7/17
 * Time: 17:01
 */

function power1($a, $n){
    $r = 1;
    for($i=0; $i<$n; $i++){
        $r *= $a;
    }
    return $r;
}

function power2($a, $n){
    $r=1;
    $b = $a;
    while($n){
        if($n%2){
            $r *= $b;
        }
        $b *= $b;
        $n/=2;
    }
    return $r;
}

function power3($a, $n){
    if($n==1){
        return $a;
    }
    if($n%2==0){
        $r = power3($a, $n/2);
        return $r*$r;
    }else{
        $r = power3($a, ($n-1)/2);
        return $r*$r*$a;
    }
}


var_dump(power1(2,4));
var_dump(power2(2,7));
var_dump(power3(2,8));