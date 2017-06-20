<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/6/20
 * Time: 10:30
 * Write a program to print all the LEADERS in the array. An element is leader if it is greater than all the elements to its right side.
 * And the rightmost element is always a leader. For example int the array {16, 17, 4, 3, 5, 2}, leaders are 17, 5 and 2.
 * O(n)
 */

$data = array(2,9,5,6,8,7,3);

function find_leaders(array $data){
    if($data==null||count($data)==0){
        return;
    }
    $len = count($data);
    $max = $data[$len-1];
    echo $max.' ';
    for($i=$len-2; $i>=0; $i--){
        if($data[$i]>$max){
            $max = $data[$i];
            echo $max.' ';
        }
    }
    echo "\n";
}

find_leaders($data);