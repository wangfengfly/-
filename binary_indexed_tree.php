<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/3
 * Time: 14:05
 * 二进制索引树 binary indexed tree
 * 树状数组
 */

function calc0($val){
    $ret = 0;
    while($val){
        if($val & 0x01){
            break;
        }else{
            $ret++;
            $val = $val>>1;
        }
    }
    return $ret;
}
/*
 * O(n^2)
 */
function build(array $arr, &$tree){
    if(!$arr){
        return;
    }
    $n = count($arr);
    for($i=0; $i<$n; $i++){
        $j = $i+1;
        $zeros = calc0($j);
        for($k=$i-pow(2,$zeros)+1; $k<=$i; $k++){
            $tree[$j] += $arr[$k];
        }
    }
}
/*
 * O(lgn)
 */
function getsum($tree, $i){
    $sum = 0;
    while($i>0){
        $sum += $tree[$i];
        $i = $i - ($i&(-$i));
    }
    return $sum;
}
/*
 * O(lgn)
 */
function update(&$tree, $i, $diff){
    $n = count($tree);
    while($i<=$n){
        $tree[$i] += $diff;
        $i = $i + ($i&(-$i));
    }
}

$arr = array(1,2,3,4,5,6,7,8);
$tree = array();
build($arr, $tree);
var_dump($tree);

$sum = getsum($tree, 5);
var_dump($sum);

$arr[2]=1;
$diff = -2;
update($tree, 2, -2);
var_dump($arr);
var_dump($tree);