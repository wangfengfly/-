<?php
/**
 * Author: wangfeng
 * Date: 2017/12/26
 * Time: 10:36
 * 求数组任意[l,r]范围内的最小值
 * O(nlgn)
 * 空间O(nlgn)
 */
/**
 * @param $arr
 * @return array|null
 * 时间 O(n^2)
 * 空间 O(n^2)
 */
function build2($arr){
    $n = count($arr);
    if(!$n){
        return null;
    }

    $data = [];
    for($i=0; $i<$n; $i++){
        $data[$i][$i] = $arr[$i];
    }

    for($i=0; $i<$n-1; $i++){
        for($j=$i+1; $j<$n; $j++){
            $data[$i][$j] = min($data[$i][$j-1], $arr[$j]);
        }
    }

    return $data;
}

function build(array $arr){
    if(!$arr){
        return false;
    }
    $n = count($arr);
    $lookup = array();
    for($i=0; $i<$n; $i++){
        $lookup[$i][0] = $arr[$i];
    }

    for($j=1; (1<<$j)<=$n; $j++){
        for($i=0; $i+(1<<($j-1))<$n; $i++){
            if($lookup[$i][$j-1] <= $lookup[$i+(1<<($j-1))][$j-1]){
                $lookup[$i][$j] = $lookup[$i][$j-1];
            }else{
                $lookup[$i][$j] = $lookup[$i+(1<<($j-1))][$j-1];
            }
        }
    }

    return $lookup;
}

function query($l, $r, $lookup){
    $n = floor(log($r-$l+1, 2));
    if($lookup[$l][$n] <= $lookup[$r-(1<<$n)+1][$n]){
        return $lookup[$l][$n];
    }else{
        return $lookup[$r-(1<<$n)+1][$n];
    }
}

$arr = array( 7, 2, 3, 0, 5, 10, 3, 12, 18);
$lookup = build($arr);
var_dump($lookup);
var_dump(query(0,4,$lookup));
var_dump(query(4,7,$lookup));
var_dump(query(7,8,$lookup));
