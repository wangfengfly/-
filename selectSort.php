<?php
/*
 * 选择排序，
 * 首先找到数组中最小的那个元素；其次将它和数组的第一个元素交换位置；再次在剩下的元素中找到最小的元素，
 * 将它和数组的第二个元素交换位置，如此往复，直到将整个数组排序。
 */
function selectSort(array &$arr){
    $n = count($arr);
    for($i=0; $i<$n; $i++){
        $k = $i;
        for($j=$i; $j<$n; $j++){
            if($arr[$j] < $arr[$k]){
                $k = $j;
            }
        }
        if($k!=$i){
            $tmp = $arr[$k];
            $arr[$k] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }
    
}

$arr = array(4,6,2,3,1,9);
selectSort($arr);
var_dump($arr);
?>