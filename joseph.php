<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/9/11
 * Time: 15:40
 * 约瑟夫环，n个人编号从1到n, 从0开始报数，报到k的那个人剔除，求最后留下的人的编号。
 */

function joseph($arr, $k){
    $n = count($arr);
    $removed = 0;
    $i=0;
    $count=0;
    while($removed<$n-1){
        if($arr[$i]!=0){
            $count++;
        }
        if($count==$k){
            $arr[$i]=0;
            $removed++;
            $count=0;
        }
        $i = ($i+1)%$n;
    }
    for($i=0;$i<$n;$i++){
        if($arr[$i]!=0){
            echo $arr[$i].PHP_EOL;
            return;
        }
    }
}

$n=9;
$arr = array();
for($i=1; $i<=$n; $i++){
    $arr[] = $i;
}

joseph($arr, 3);