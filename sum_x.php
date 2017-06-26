<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/6/26
 * Time: 13:51
 * 给定两个有序数组，每个数组中的元素都不同。给定一个数sum, 求出两个数组中和为sum的元素对。
 * O(m+n)
 * 空间复杂度O(1)
 */

function find($arr1, $arr2, $sum){
    $n1 = count($arr1);
    $n2 = count($arr2);
    if($n1==0 || $n2==0){
        return;
    }
    $i=0;
    $j=$n2-1;
    while($i<$n1 && $j>=0){
        if($arr1[$i]+$arr2[$j]==$sum){
            echo "($arr1[$i],$arr2[$j])\n";
            $i++;
            $j--;
        }else if($arr1[$i]+$arr2[$j]<$sum){
            $i++;
        }else{
            $j--;
        }
    }

}

$arr1=array(1, 2, 3, 4, 5, 7, 11);
$arr2=array(2, 3, 4, 5, 6, 8, 12);
$sum=9;
find($arr1, $arr2, $sum);