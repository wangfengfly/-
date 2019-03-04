<?php
/**
 * Author: wangfeng
 * Date: 2019/3/4
 * Time: 18:23
 * 不占用额外的空间，克隆一个栈
 */

function cloneStack($stack){
    if(!$stack){
        return;
    }

    $res = [];
    $count = 0;
    $n = count($stack);
    while($count <= $n-1){
        $top = array_pop($stack);
        while($stack && count($stack)>$count){
            array_push($res, array_pop($stack));
        }
        array_push($stack, $top);
        while($res){
            array_push($stack, array_pop($res));
        }
        $count++;
    }
    $res = [];
    while($stack){
        array_push($res, array_pop($stack));
    }
    return $res;
}

var_dump(cloneStack([1,2,3,4,5,6]));
var_dump(cloneStack([6,5,3,21,6,8]));
var_dump(cloneStack([1]));