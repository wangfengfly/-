<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/3/1
 * Time: 9:48
 * naive pattern search
 */

function search($str, $pat){
    $str_len = strlen($str);
    $pat_len = strlen($pat);

    for($i=0; $i < $str_len; $i++){
        $j = 0;
        $_i = $i;
        while($j < $pat_len){
            if($str[$_i] == $pat[$j]){
                $_i++;
                $j++;
            }else{
                break;
            }
        }
        if($j == $pat_len) {
            echo ($_i-$pat_len) . ': ' . $pat . PHP_EOL;
        }
    }
}

$str = "AABAACAADAABAABA";
$pat = "AABA";
search($str, $pat);