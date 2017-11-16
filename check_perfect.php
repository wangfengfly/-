<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/16
 * Time: 15:40
 * 判断给定的数组是否完美，完美数组定义：如果一个数组元素先上升，再保持不变，然后又下降，则
 * 该数组为完美数组。
 */

function check(array $arr){
    if(!$arr){
        return true;
    }
    $incr = false;
    $const = false;
    $desc = false;

    $n = count($arr);
    for($i=0; $i<$n-1; $i++){
        if($arr[$i+1] > $arr[$i]){
            $incr = true;
            if($const || $desc){
                return false;
            }
        }else if($arr[$i+1] == $arr[$i]){
            $const = true;
            if($desc){
                return false;
            }
        }else{
            $desc = true;
        }
    }
    return true;
}

/*
 * 更优雅的实现
 */
function check2(array $arr){
    if(!$arr){
        return true;
    }
    $n = count($arr);
    $i=1;
    while($arr[$i]>$arr[$i-1] && $i<$n){
        $i++;
    }

    while($arr[$i]==$arr[$i-1] && $i<$n){
        $i++;
    }

    while($arr[$i]<$arr[$i-1] && $i<$n){
        $i++;
    }

    return $i==$n;
}

$arr = array(1, 8, 8, 8, 3, 2);
var_dump(check2($arr));

$arr = array(1, 1, 2, 2, 1);
var_dump(check2($arr));

$arr = array(4, 4, 4, 4);
var_dump(check2($arr));