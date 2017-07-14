<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/7/14
 * Time: 19:29
 */

function allsubset($arr){
    $n = count($arr);
    for($i=0; $i<(1<<$n); $i++){
        echo "{";
        for($j=0; $j<$n; $j++){
            if(($i & (1<<$j)) > 0){
                echo $arr[$j],' ';
            }
        }
        echo "}\n";
    }
}

allsubset(array('a', 'b', 'c', 'd'));