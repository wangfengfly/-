<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/6/23
 * Time: 14:51
 * 判断一个数组是否是k有序数组
 * k有序数组：每个元素在该数组中的下标和在该数组排序以后的下标距离不超过$k
 */

function isKsorted(array $arr, $k){
    $len = count($arr);
    $l=0;
    $r=0;
    for($i=0; $i<$len; $i++){
        for($j=$i-1; $j>=0; $j--){
            if($arr[$j] > $arr[$i]){
                $l++;
            }
        }
        for($j=$i+1; $j<$len; $j++){
            if($arr[$j] < $arr[$i]){
                $r++;
            }
        }
        if(abs($r-$l) > $k){
            return false;
        }
    }
    return true;
}

function isKsorted2(array $arr, $k){
    $aux = $arr;
    sort($aux);
    $len = count($arr);
    for($i=0; $i<$len; $i++){
        $v = $arr[$i];
        $index = binarySearch($aux, $v);
        if(abs($i-$index) > $k){
            return false;
        }
    }
    return true;
}

function binarySearch(array $aux, $v){
    $l = 0;
    $h = count($aux)-1;
    while($l<=$h){
        $mid = floor(($h+$l)/2);
        if($v == $aux[$mid]){
            return $mid;
        }else if($v > $aux[$mid]){
            $l = $mid+1;
        }else{
            $h = $mid-1;
        }
    }
    return -1;
}

$arr = array(13, 2, 1, 5, 6, 4);
$res = isKsorted2($arr, 2);
var_dump($res);