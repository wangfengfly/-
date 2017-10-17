<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/17
 * Time: 18:46
 * 计数排序
 */

function counting_sort(array $arr){
    if(!$arr){
        return;
    }
    $count = array();
    $n = count($arr);
    $max = max($arr);
    //初始化
    for($i=0; $i<=$max; $i++){
        $count[$i] = 0;
    }
    for($i=0; $i<$n; $i++){
        $count[$arr[$i]]++;
    }
    //计算每个元素的位置
    for($i=1; $i<count($count); $i++){
        $count[$i] += $count[$i-1];
    }

    $data = array();
    //初始化，键从0开始
    for($i=0; $i<$n; $i++){
        $data[$i] = 0;
    }
    for($i=0; $i<$n; $i++){
        $e = $arr[$i];
        $c = $count[$e];
        $data[$c-1] = $arr[$i];
        $count[$e] = $count[$e]-1;
    }

    return $data;
}

$arr = array(1,4,1,2,7,5,2);
$data = counting_sort($arr);
var_dump($data);