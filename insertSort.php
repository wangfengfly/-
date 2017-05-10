<?php

/*
 * 插入排序
 * 将元素插入到已经有序的数组中的适当位置
 */
function insertSort(array &$arr){
    $n = count($arr);
    for($i=0; $i<$n; $i++){
        for($j=$i; $j>=0; $j--){
            if($j-1>=0 && $arr[$j]<$arr[$j-1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j-1];
                $arr[$j-1] = $temp;
            }
        }
    }
}

$arr = array(4,6,2,3,9,1);
insertSort($arr);
var_dump($arr);

$arr = array(1,2,3,4,5,6);
insertSort($arr);
var_dump($arr);

?>