<?php
/*
 *给出包含n个整数的数组，你的任务是检查它是否可以通过修改至多一个元素变成非下降的。一个非下降的数组array对于所有的i（1<=i<n）满足array[i-1]<=array[i]。n属于区间[1,10000]。
 * O(n)
 */
function check(array $arr){
	$n = count($arr);
	$count = 0;
	$pos = -1;
	for($i=1; $i<$n; $i++){
		if($arr[$i-1] > $arr[$i]){
			$count++;
			$pos = $i;
		}
	}
	if($count == 0){
		return true;
	}else if($count > 1){
		return false;
	}

	if($pos == 1 || $pos == $n-1 || $arr[$pos-2] <= $arr[$pos] || $arr[$pos-1] <= $arr[$pos+1]){
		return true;
	}
	return false;
}

$arr = array(4,2,3);
var_dump(check($arr));

$arr = array(4,2,1);
var_dump(check($arr));

