<?php
/**
 * Author: wangfeng
 * Date: 2018/6/5
 * Time: 10:32
 */

function heapify(array &$arr, $root, $n){
    if(!$arr || $n<=1){
        return;
    }
    $l = 2*$root+1;
    $r = 2*$root+2;
    $maxi = $root;
    if($l<$n && $arr[$l]>$arr[$maxi]){
        $maxi = $l;
    }
    if($r<$n && $arr[$r]>$arr[$maxi]){
        $maxi = $r;
    }

    if($maxi != $root){
        $temp = $arr[$maxi];
        $arr[$maxi] = $arr[$root];
        $arr[$root] = $temp;
        heapify($arr, $maxi, $n);
    }
}

/**
 * @param array $arr
 * O(nlgn)
 */
function heap(array &$arr){
    if(!$arr || count($arr)<=1){
        return;
    }
    $n = count($arr);
    for($i=floor(($n-1)/2); $i>=0; $i--){
        heapify($arr, $i, $n);
    }
}

/**
 * @param array $arr
 * O(nlgn)
 */
function heapsort(array &$arr){
    if(!$arr || count($arr)<=1){
        return;
    }
    heap($arr);
    $n = count($arr);
    for($l=$n-1; $l>0; $l--){
        $temp = $arr[0];
        $arr[0] = $arr[$l];
        $arr[$l] = $temp;
        heapify($arr, 0, $l);
    }
}

$arr = array(8,7,3,6,5,9);
$arr = array(5,4,3,2,1);
$arr = array(1,2,3,4,5,6);
$arr = array(6,5,4,3,2,1);
$arr = array(1);
var_dump($arr);

heapsort($arr);
var_dump($arr);

