<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/28
 * Time: 14:22
 * 求无序数组中(l,r)范围内的最小值。
 */

function build(array $arr){
    if(!$arr){
        return;
    }
    $n = count($arr);
    $table = array();
    for($i=0; $i<$n; $i++){
        $table[$i][0] = $arr[$i];
    }
    for($i=1; (1<<$i)<=$n; $i++){
        for($j=0; $j+(1<<$i)-1<$n; $j++){
            $table[$j][$i] = min($table[$j][$i-1], $table[$j+(1<<($i-1))][$i-1]);
        }
    }
    return $table;
}

function query($l, $r, $table){
    $j = floor(log($r-$l+1,2));
    if($table[$l][$j] <= $table[$r-(1<<$j)+1][$j]){
        return $table[$l][$j];
    }else{
        return $table[$r-(1<<$j)+1][$j];
    }
}

$table = build(array( 7, 2, 3, 0, 5, 10, 3, 12, 18));
var_dump(query(0,4,$table));
var_dump(query(4,7,$table));
var_dump(query(7,8,$table));