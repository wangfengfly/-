<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/9/26
 * Time: 10:08
 * 实现字符串的左旋操作，比如abcdef左旋2位以后是cdefab，左旋4位是efabcd
 * 要求时间复杂度O(n) 空间复杂度O(1)
 */

function swap(&$str, $i, $j){
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp;
}

function rotate($str, $n){
    $len = strlen($str);
    $i=0;
    $j=$n-1;
    while($i<=$j){
        swap($str, $i, $j);
        $i++;
        $j--;
    }
    $i=$n;
    $j=$len-1;
    while($i<=$j){
        swap($str, $i, $j);
        $i++;
        $j--;
    }

    $i=0;
    $j=$len-1;
    while($i<=$j){
        swap($str, $i, $j);
        $i++;
        $j--;
    }
    return $str;
}

$str = "abcde";
var_dump(rotate($str,3));
var_dump($str);