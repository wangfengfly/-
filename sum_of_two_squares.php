<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/16
 * Time: 15:01
 * 给定一个正整数n， 判断是否可以表示为两个整数的平方和
 */

/*
 * 空间复杂度O(n)
 * 时间复杂度O(sqrt(n))
 */
function check($n){
    $hash = array();
    for($i=0; $i*$i<=$n; $i++){
        $hash[$i*$i] = 1;
        if(isset($hash[$n-$i*$i])){
            return true;
        }
    }
    return false;
}

var_dump(check(17));
var_dump(check(169));
var_dump(check(24));
var_dump(check(18));