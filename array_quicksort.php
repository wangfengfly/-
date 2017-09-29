<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/9/29
 * Time: 15:01
 * 按数组的值对数组进行快速排序
 */

function quicksort(array $arr){
    if(count($arr)<2){
        return $arr;
    }

    $left = array();
    $right = array();
    $pk = key($arr);
    $pv = array_shift($arr);

    foreach($arr as $k=>$v){
        if($v < $pv){
            $left[$k] = $v;
        }else{
            $right[$k] = $v;
        }
    }
    return array_merge(quicksort($left), array($pk=>$pv), quicksort($right));
}

$arr = array('x'=>'xv', 'd'=>'dv', 'c'=>'cv', 'a'=>'av', 'z'=>'zv');
$sorted_arr = quicksort($arr);
var_dump($sorted_arr);