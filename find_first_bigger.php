<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/8/2
 * Time: 13:56
 * 给定数组，打印出每个元素和后面第一个比它大的元素
 */

function find($arr){
    $n = count($arr);
    if($arr==null || $n==0){
        return;
    }
    $stack = new SplStack();
    $stack->push($arr[0]);
    for($i=1; $i<$n; $i++){
        $next = $arr[$i];
        while(!$stack->isEmpty()){
            $top = $stack->pop();
            if($top<$next){
                echo "$top---->$next\n";
            }else{
                $stack->push($top);
                break;
            }
        }
        $stack->push($next);
    }
    while(!$stack->isEmpty()){
        $top = $stack->pop();
        echo "$top---->-1\n";
    }
}

find(array(11,12,14,13));