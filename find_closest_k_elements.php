<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/2/28
 * Time: 10:17
 * 有序数组中找出距离$x最近的$k个元素
 */

function find_loc($arr, $l, $h, $x){
    if($x >= $arr[$h]){
        return $h;
    }
    if($x <= $arr[$l]){
        return $l;
    }
    $mid = ceil(($l + $h)/2);
    if($arr[$mid] <= $x && $arr[$mid+1] > $x){
        return $mid;
    }else if($arr[$mid] > $x){
        return find_loc($arr, $l, $mid-1, $x);
    }else{
        return find_loc($arr, $mid+1, $h, $x);
    }
}

function find_closest($arr, $l, $h, $x, $k){
    /*
     * $mid is crossover point, left is smaller than $arr[$mid]
     * right is larger than $arr[$mid]
     * $arr[$mid] is closest to $x
     */
    $mid = find_loc($arr, $l, $h, $x);
    echo $arr[$mid] . ' ';
    $l = $mid - 1;
    $h = $mid + 1;
    $total = 1;
    while($total < $k && $l >= 0 && $h < count($arr)){
        if($x - $arr[$l] < $arr[$h] - $x){
            echo $arr[$l] . ' ';
            $l--;
        }else{
            echo $arr[$h] . ' ';
            $h++;
        }
        $total++;
    }
    while($total < $k && $l >= 0){
        echo $arr[$l] . ' ';
        $l--;
        $total++;
    }
    while($total < $k && $h < count($arr)){
        echo $arr[$h] . ' ';
        $h++;
        $total++;
    }
}

$k=4;
$x=32;
$arr = array(12, 16, 22, 30, 36, 39, 42,
               45, 48, 50, 53, 55, 56);
var_dump(find_loc($arr, 0, count($arr)-1, $x));
find_closest($arr, 0, count($arr) - 1, $x, $k);