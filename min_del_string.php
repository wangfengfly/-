<?php
/*
 * 给定一个字符串s，你可以从中删除一些字符，使得剩下的串是一个回文串。
 * 如何删除才能使得回文串最长呢？输出需要删除的字符个数 。
 *
 */
function min_del($str){
    $rev = strrev($str);
    $len = strlen($str);
    $res = array();
    for($i = 0; $i < $len + 1; $i++){
        $res[0][$i] = 0;
        $res[$i][0] = 0;
    }
    
    for($i = 1; $i < $len + 1; $i++){
        for($j = 1; $j < $len + 1; $j++){
            if($str[$i-1] == $rev[$j-1]){
                $res[$i][$j] = $res[$i-1][$j-1] + 1;
            }else{
                $res[$i][$j] = max($res[$i-1][$j], $res[$i][$j-1]);
            }
        }
    }
    
    return $len - $res[$len][$len];
}

$str = "labcedvxyel";
echo min_del($str) . PHP_EOL;
?>