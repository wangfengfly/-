<?php
/**
 * Author: wangfeng
 * Date: 2018/7/11
 * Time: 11:53
 * n个顶点的图，使用最多m个颜色着色，相邻顶点颜色不同，打印输出着色方案
 * backtracking
 */

function isSafe($graph, $color, $v, $c){
    $n = count($graph);
    for($i=0; $i<$n; $i++){
        if($graph[$v][$i] && $color[$i]==$c){
            return false;
        }
    }

    return true;
}

function printSolution($color){
    $n = count($color);
    for($i=0; $i<$n; $i++){
        echo $color[$i].' ';

    }
    echo PHP_EOL;
}

function coloringUtil($graph, &$color, $v, $m){
    $n = count($graph);
    if($v == $n){
        return true;
    }
    for($i=0; $i<$m; $i++){
        if(isSafe($graph, $color, $v, $i)){
            $color[$v] = $i;
            if(coloringUtil($graph, $color, $v+1, $m)){
                return true;
            }else {
                $color[$v] = 0;
            }
        }
    }
    return false;
}

function coloring($graph, $v, $m){
    $color = [];
    $n = count($graph);
    for($i=0; $i<$n; $i++){
        $color[$i] = -1;
    }

    if(coloringUtil($graph, $color, $v, $m) == false){
        echo "no solution\n";
        return false;
    }

    printSolution($color);
    return true;
}

$graph = [[0,1,1,1],[1,0,1,0],[1,1,0,1],[1,0,1,0]];
coloring($graph, 0, 3);