<?php
/**
 * Author: wangfeng
 * Date: 2018/7/3
 * Time: 14:51
 * 无序的二维数组中查找peak元素
 * peak元素定义：如果一个元素大于等于它四周的元素，该元素就是peak元素。
 * O(rows*lg(columns))
 * 注意，只需要找到一个即可。
 */

function peak(array $data, $l, $h){
    if(!$data){
        return;
    }
    if(!is_array($data[0])){
        return;
    }
    $mid = floor($l+($h-$l)/2);
    $max = PHP_INT_MIN;
    $maxi = -1;
    $rows = count($data);
    for($i=0; $i<$rows; $i++){
        if($data[$i][$mid] > $max){
            $max = $data[$i][$mid];
            $maxi = $i;
        }
    }

    $leftv = $rightv = null;
    if($mid-1>=$l && $mid-1<=$h){
        $leftv = $data[$maxi][$mid-1];
    }
    if($mid+1>=$l && $mid+1<=$h){
        $rightv = $data[$maxi][$mid+1];
    }

    if($leftv && $rightv){
        if($leftv<$max && $rightv<$max){
            return $max;
        }
    }else if($leftv){
        if($leftv < $max){
            return $max;
        }
    }else if($rightv){
        if($rightv < $max){
            return $max;
        }
    }else{
        return $max;
    }
    if($leftv && $leftv>$max){
        return peak($data, $l, $mid-1);
    }
    if($rightv && $rightv>$max){
        return peak($data, $mid+1, $h);
    }
}

$data = [[10,20,15], [21,30,14],[7,16,32]];
var_dump(peak($data, 0, count($data[0])-1));

$data = [[ 10, 8, 10, 10 ], [ 14, 13, 12, 11 ], [ 15, 9, 11, 21 ], [ 16, 17, 19, 20]];
var_dump(peak($data, 0, count($data[0])-1));