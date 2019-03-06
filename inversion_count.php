<?php
/**
 * Author: wangfeng
 * Date: 2019/3/5
 * Time: 15:32
 * 求数组的逆序数。a[i]>a[j], i<j, 则定义为逆序。
 * T(n)=2T(n/2) 时间复杂度O(nlgn) 空间复杂度O(n)
 */

function merge(array &$data, $l, $r){
    if($l < $r){
        $mid = intval(floor(($r+$l)/2));
        $left = [];
        for($i=$l; $i<=$mid; $i++){
            $left[] = $data[$i];
        }
        $right = [];
        for($i=$mid+1; $i<=$r; $i++){
            $right[] = $data[$i];
        }
        $i = $j = 0;
        $k = $l;
        $inver = 0;
        while($i<count($left) && $j<count($right)){
            if($left[$i] > $right[$j]){
                $inver += ($mid-$i+1);
                $data[$k++] = $right[$j++];
            }else{
                $data[$k++] = $left[$i++];
            }
        }
        while($i < count($left)){
            $data[$k++] = $left[$i++];
        }
        while($j < count($right)){
            $data[$k++] = $right[$j++];
        }
        return $inver;
    }
    return 0;
}

function inverCount(array &$data, $l, $r){
    if($l < $r){
        $mid = intval(floor(($r+$l)/2));
        $inv1 = inverCount($data, $l, $mid);
        $inv2 = inverCount($data, $mid+1, $r);
        return $inv1+$inv2+merge($data, $l, $r);
    }
    return 0;
}

$data = [1, 20, 6, 4, 5];
var_dump(inverCount($data, 0, count($data)-1));

$data = [2, 4, 1, 3, 5];
var_dump(inverCount($data, 0, count($data)-1));