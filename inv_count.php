<?php
/*
 * 计算一个无序数组的逆序数，逆序数定义为：
 * 如果a[i]>a[j], i<j, 则是一个逆序。
 * 时间复杂度O(nlgn)
 */
function merge(array &$arr, $left, $mid, $right){
	$i=$left;
	$j=$mid+1;
	$k=$left;
	$temp = array();
	$inv_count = 0;
	while($i<=$mid && $j<=$right){
		if($arr[$i] <= $arr[$j]){
			$temp[$k] = $arr[$i];
			$i++;
			$k++;
		}else{
			$temp[$k] = $arr[$j];
			$j++;
			$k++;
			$inv_count += $mid-$i+1;
		} 
	}
	while($i<=$mid){
		$temp[$k++] = $arr[$i++];
	}
	while($j<=$right){
		$temp[$k++] = $arr[$j++];
	}
	while($left<=$right){
		$arr[$left] = $temp[$left];
		$left++;
	}
	return $inv_count;
}

function inv_count(array &$arr, $left, $right){
	if($left >= $right){
		return 0;
	}
	$mid = $left + floor(($right-$left)/2);
	$inv_count = inv_count($arr, $left, $mid);
	$inv_count += inv_count($arr, $mid+1, $right);
	$inv_count += merge($arr, $left, $mid, $right);
	return $inv_count;
}

$arr = array(2,4,1,1,3,5);
var_dump(inv_count($arr, 0, count($arr)-1));

$arr = array(1,1,1,1,1);
var_dump(inv_count($arr, 0, count($arr)-1));

$arr = array(1,2,3,4,5);
var_dump(inv_count($arr, 0, count($arr)-1));

$arr = array(5,4,3,2,1);
var_dump(inv_count($arr, 0, count($arr)-1));
