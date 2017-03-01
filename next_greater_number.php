<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/1
 * Time: 16:53
 * 求出比给定数大的最小的数，而且该数和原来的数有相同的数字
 */
function swap(&$str, $i, $k){
    $temp = $str[$i];
    $str[$i] = $str[$k];
    $str[$k] = $temp;
}

function partition(&$str, $l, $h){
    $pivot = $str[$l];
    while($h > $l){
        while($str[$h] > $pivot && $h > $l){
            $h--;
        }
        if($str[$h] < $pivot){
            $str[$l] = $str[$h];
        }
        while($str[$l] <= $pivot && $h > $l){
            $l++;
        }
        if($str[$l] > $pivot){
            $str[$h] = $str[$l];
        }
    }
    $str[$l] = $pivot;
    return $l;
}
/*
 * 快速排序
 */
function qsort(&$str, $l, $h){
    if($l >= $h){
        return;
    }
    $p = partition($str, $l, $h);
    qsort($str, $l, $p-1);
    qsort($str, $p+1, $h);
}

function next_greater($str){
    $len = strlen($str);
    $i = $len-2;
    //从最右边开始，找到比后一个数小的位置
    while($i >= 0){
        if($str[$i] >= $str[$i+1]){
            $i--;
        }else{
            break;
        }
    }
    //找出该位置后面比该数大的最小的数字
    $k = $i+1;
    for($j=$k+1; $j<$len; $j++){
        if($str[$j] < $str[$k] && $str[$j] > $str[$i]){
            $k = $j;
        }
    }
    //将两个数进行交换
    swap($str, $i, $k);
    //该数右边的数升序排序
    qsort($str, $i+1, $len-1);
    echo $str .PHP_EOL;
}

$str = '534976';
next_greater($str);