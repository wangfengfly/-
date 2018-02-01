<?php
/**
 * Author: wangfeng
 * Date: 2018/1/31
 * Time: 15:14
 * 求出无序数组中每一个数后面第一个比它大的数
 */
require_once './stack.php';

function ngx(array $arr){
    $n = count($arr);
    if(!$arr || !$n){
        return;
    }

    $stack = new Stack($n);
    $stack->push($arr[0]);
    for($i=1; $i<$n; $i++){
        $next = $arr[$i];
        while(!$stack->isEmpty()){
            $top = $stack->getTop();
            if($next > $top){
                echo "$top -- $next\n";
                $stack->pop();
            }else{
                break;
            }
        }
        $stack->push($next);
    }

    while(!$stack->isEmpty()){
        $top = $stack->pop();
        echo "$top -- -1\n";
    }
}

$arr = array(15,6,12,19,8,7,3,10);
ngx($arr);

$arr = array(1,2,3,4,5,6);
ngx($arr);

$arr = array(6,5,4,3,2,1);
ngx($arr);