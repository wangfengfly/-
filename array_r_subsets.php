<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/1
 * Time: 19:15
 * 打印大小为n的数组，r个元素的所有子数组
 */

function find_subset($arr, $i, &$data, $index, $r){
    $n = count($arr);
    if($index == $r){
        var_dump($data);
        return;
    }

    if($i == $n){
        return;
    }
    //包含第$i个元素
    $data[$index] = $arr[$i];
    find_subset($arr, $i+1, $data, $index+1, $r);
    //不包含第$i个元素
    find_subset($arr, $i+1, $data, $index, $r);
}

$arr = array(1,2,3,4);
$data = array();
find_subset($arr, 0, $data, 0, 2);