<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/1
 * Time: 10:06
 * 线段树用数组表示，节点i的左节点2*i+1, 节点i的右节点2*i+2
 * 构造线段树
 */

function build($arr, $l, $h, $i, &$tree){
    if($l == $h){
        $tree[$i] = $arr[$l];
        return $arr[$l];
    }
    $mid = $l + floor(($h-$l)/2);
    $tree[$i] = build($arr, $l, $mid, 2*$i+1, $tree) + build($arr, $mid+1, $h, 2*$i+2, $tree);
    return $tree[$i];
}
/*
 * 求arr数组中下标在[$l,$h]之间的元素和
 * $i：$tree当前节点
 * [$start, $end]: $i节点表示的和的范围
 * O(lgn)
 */
function sum($tree, $i, $start, $end, $l, $h){
    if($l<=$start && $h>=$end){
        return $tree[$i];
    }
    if($l>$end || $h<$start){
        return 0;
    }
    $mid = $start + floor(($end-$start)/2);
    return sum($tree, 2*$i+1, $start, $mid, $l, $h) +
        sum($tree, 2*$i+2, $mid+1, $end, $l, $h);
}
/*
 * 更新线段树
 * $i 当前节点
 * [$start, $end] 当前节点代表的范围
 * $j $arr中被更新的元素下标
 * $diff 更新前后差值
 * O(lgn)
 */
function update(&$tree, $i, $start, $end, $j, $diff){
    if($j<$start || $j>$end || !isset($tree[$i])){
        return;
    }
    $tree[$i] += $diff;
    $mid = $start + floor(($end - $start) / 2);
    update($tree, 2 * $i + 1, $start, $mid, $j, $diff);
    update($tree, 2 * $i + 2, $mid + 1, $end, $j, $diff);

}

$arr = array(1,3,5,7,9,11);
$tree = array();
build($arr, 0, count($arr)-1, 0, $tree);
$sum = sum($tree, 0, 0, count($arr)-1, 1, 4);
var_dump($sum);
$newval = 4;
$diff = $newval - $arr[4];
$arr[4] = $newval;
update($tree, 0, 0, count($arr)-1, 4, $diff);
var_dump($arr);
var_dump($tree);