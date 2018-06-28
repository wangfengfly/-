<?php
/**
 * Author: wangfeng
 * Date: 2018/6/28
 * Time: 11:06
 *
 */

/*
 * hash
 */
function find_triple_sum(array $arr, $sum){
    if(!$arr){
        return;
    }
    $map = [];
    $n = count($arr);
    $found = false;
    for($i=0; $i<$n-1; $i++){
        //remember to clear map
        $map = [];
        for($j=$i+1; $j<$n; $j++){
            $sum = $arr[$i] + $arr[$j];
            if(isset($map[-1*$sum])){
                $ele = -1*$sum;
                echo "($arr[$i], $ele, $arr[$j])\n";
                $found = true;
            }else{
                $map[$arr[$j]] = 1;
            }
        }
    }
    if($found == false){
        echo "No Triple sum to $sum\n";
    }
}

find_triple_sum([1,1,-2,0,5], 0);
find_triple_sum([1,-1,-2,0,5], 0);