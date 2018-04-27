<?php
/**
 * Author: wangfeng
 * Date: 2018/4/27
 * Time: 14:09
 */

function partition(&$arr, $l, $h){
    if(!$arr || $l>=$h){
        return;
    }

    $pivot = $arr[$l];
    while($l < $h) {
        while ($arr[$h] > $pivot && $h>$l) {
            $h--;
        }
	if($l < $h){
        	$arr[$l] = $arr[$h];
		$l++;
	}	
       
        while ($arr[$l] <= $pivot && $l<$h) {
            $l++;
        }
	if($l < $h){
        	$arr[$h] = $arr[$l];
        	$h--;
	}
    }
    $arr[$l] = $pivot;
    return $l;
}

function quicksort(&$arr, $l, $h){
    if($l>=$h){
        return;
    }
    $p = partition($arr, $l, $h);
    quicksort($arr, $l, $p-1);
    quicksort($arr, $p+1, $h);
}

$arr = [4,3,2,5,1,6];
$arr = [1,1,1,1];
$arr = [1,2,3,4,5,6];
$arr = [6,5,4,3,2,1];
quicksort($arr, 0, count($arr)-1);
var_dump($arr);
