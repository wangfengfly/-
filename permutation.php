<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/7/17
 * Time: 14:04
 */

function permutation($str, $n){
    if($n==1){
        return array($str[$n-1]);
    }
    $res = permutation($str, $n-1);
    $data = array();
    foreach($res as $item){
        $data[] = $str[$n-1].$item;
        $len = strlen($item);
        for($i=0; $i<$len-1; $i++){
            $substr = substr($item, $i+1);
            $data[] = substr($item, 0, $i+1).$str[$n-1].$substr;
        }
        $data[] = $item.$str[$n-1];
    }
    unset($res);
    return $data;
}

var_dump(permutation("abcd", 4));