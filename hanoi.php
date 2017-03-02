<?php
/**
 * Created by PhpStorm.
 * User: wangfeng
 * Date: 2017/3/2
 * Time: 16:12
 * 汉诺塔
 */
function move($s, $d, $n){
    echo "move disk $n: $s ==> $d\n";
}
function hanoi($s, $m, $d, $n){
    if($n == 1){
        move($s, $d, $n);
        return;
    }
    hanoi($s, $d, $m, $n-1);
    move($s, $d, $n);
    hanoi($m, $s, $d, $n-1);
}

hanoi('A', 'B', 'C', 4);