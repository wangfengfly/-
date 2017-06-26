<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/6/26
 * Time: 11:02
 * 给定一个数组和k， 输出窗口大小为k的序列中第一个负数
 */
/*
 * O（(n-k+1)k)
 */
function kwindow1($arr, $k){
    $n = count($arr);
    for($i=0; $i<$n-$k+1; $i++){
        for($j=0; $j<$k; $j++){
            if($arr[$i+$j]<0){
                echo $arr[$i+$j].' ';
                break;
            }
        }
        if($j>=$k) {
            echo '0 ';
        }
    }
    echo "\n";
}
/*
 * O(n)
 */
function kwindow($arr, $k){
    $n = count($arr);
    $queue = new SplQueue();
    for($i=0; $i<$k; $i++){
        if($arr[$i]<0){
            $queue->enqueue($i);
        }
    }
    for(;$i<$n; $i++){
        if(!$queue->isEmpty()){
            echo $arr[$queue->bottom()]." ";
        }else{
            echo "0 ";
        }
        while(!$queue->isEmpty() && $queue->bottom()<$i-$k+1){
            $queue->dequeue();
        }
        if($arr[$i]<0){
            $queue->enqueue($i);
        }
    }
    if(!$queue->isEmpty()){
        echo $arr[$queue->bottom()].' ';
    }else{
        echo '0 ';
    }
    echo "\n";
}

$arr = array(12, -1, -7, 8, -15, 30, 16, 28);
kwindow($arr, 3);
kwindow1($arr, 3);