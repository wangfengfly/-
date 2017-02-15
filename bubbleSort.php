/*
 * 冒泡排序
 */
<?php

$arr = array(6,8,5,9,10,11,7);
$c = count($arr);

for($j = 0; $j < $c; $j++){
	for($i = 0; $i < $c - $j - 1; $i++){
		if($arr[$i] > $arr[$i + 1]){
			$temp = $arr[$i];
			$arr[$i] = $arr[$i + 1];
			$arr[$i + 1] = $temp;
		}
	}
}

var_dump($arr);

?> 
