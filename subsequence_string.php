<?php
/**
 * Author: wangfeng
 * Date: 2018/7/11
 * Time: 14:26
 * 判断一个字符串是否是另一个字符串的子序列
 * 子序列定义：将str2中的某些字符删除，不改变其他字符的顺序，能够得到str1,则
 * 称str1是str2的子序列
 *
 */

function issub($str1, $str2){
    if(!$str1 || !$str2){
        return false;
    }

    $n1 = strlen($str1);
    $n2 = strlen($str2);
    $i = $j = 0;
    while($i<$n1 && $j<$n2){
        if($str1[$i] != $str2[$j]){
            $j++;
        }else{
            $i++;
            $j++;
        }
    }
    if($i<$n1){
        return false;
    }
    return true;
}

var_dump(issub('AXY', 'ADXCPY'));
var_dump(issub('AXY', 'YADXCP'));
var_dump(issub('gksrek', 'geeksforgeeks'));
var_dump(issub('gksrek', 'abcde'));