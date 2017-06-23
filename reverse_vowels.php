<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/6/23
 * Time: 18:43
 * 将字符串中的元音字符进行位置交换
 */

function isVowels($c){
    return in_array($c, array('a','e','i','o','u','A','E','I','O','U'));
}

function swap(&$str, $i, $j){
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp;
}

function reverse_vowels($str){
    if($str == null){
        return null;
    }
    $len = strlen($str);
    $i=0;
    $j=$len-1;
    while($i<=$j){
        if(!isVowels($str[$i])){
            $i++;
        }
        if(!isVowels($str[$j])){
            $j--;
        }
        if(isVowels($str[$i]) && isVowels($str[$j])) {
            swap($str, $i, $j);
            $i++;
            $j--;
        }
    }
    return $str;
}

var_dump(reverse_vowels("hello world"));//output：string(11) "hollo werld"