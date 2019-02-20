<?php
/**
 * Author: wangfeng
 * Date: 2019/2/20
 * Time: 15:20
 * 快速排序
 * 排序算法的时间复杂度要看比较次数随着问题规模的变化。
 * 最好的情况下，每次都将数组一分为二，类似一颗平衡二叉树，左边的不再需要和右边的每个元素比较，减少了比较次数，
 * O(n)=2O(n/2) 算法复杂度O(n)=nlgn
 * 最坏情况下，数组已经有序，每次问题规模没法减半，偏二叉树，比较次数O(n^2)
 */

function swap(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function partition(array &$arr, $l, $h){
    $p = $arr[$l];
    while($l < $h){
        while($h>$l && $arr[$h] > $p){
            $h--;
        }
        if($h>$l){
            $arr[$l] = $arr[$h];
        }
        while($l<$h && $arr[$l] <= $p){
            $l++;
        }
        if($l<$h){
            $arr[$h] = $arr[$l];
        }

    }
    $arr[$l] = $p;
    return $l;
}

function quick_sort(array &$arr, $l, $h){
    if(!$arr || $l>=$h){
        return;
    }

    $p = partition($arr, $l, $h);
    quick_sort($arr, $l, $p-1);
    quick_sort($arr, $p+1, $h);

}

$data = [98, 90, 32, 21];
quick_sort($data, 0, count($data)-1);
var_dump($data);

$data = [1,2,3,4,5,6];
quick_sort($data, 0, count($data)-1);
var_dump($data);

$data = [1,1,2,2,2];
quick_sort($data, 0, count($data)-1);
var_dump($data);

$data = [2,2,2,1,1];
quick_sort($data, 0, count($data)-1);
var_dump($data);

$data = [1,1,1,1,1];
quick_sort($data, 0, count($data)-1);
var_dump($data);