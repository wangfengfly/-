<?php
/**
 * Author: wangfeng
 * Date: 2018/7/3
 * Time: 10:18
 * 回溯法解决骑士旅行问题
 */

const N = 8;

function printSolutions($solutions){
    for($x=0; $x<N; $x++){
        for($y=0; $y<N; $y++){
            echo $solutions[$x][$y].' ';
        }
        echo PHP_EOL;
    }
}

function isSafe($x, $y, $solutions){
    if($x>=0 && $x<N && $y>=0 && $y<N && $solutions[$x][$y]==-1){
        return true;
    }
    return false;
}

function solveRecursively($x, $y, $movei, &$solutions, $xMove, $yMove){
    if($movei == N*N){
        return true;
    }

    for($i=0; $i<8; $i++){
        $nextx = $x+$xMove[$i];
        $nexty = $y+$yMove[$i];
        if(isSafe($nextx, $nexty, $solutions)){
            $solutions[$nextx][$nexty] = $movei;
            if(solveRecursively($nextx, $nexty, $movei+1, $solutions, $xMove, $yMove)){
                return true;
            }else{
                $solutions[$nextx][$nexty] = -1;
            }
        }
    }
    return false;
}

function solveKT(){
    $solutions = [];
    for($i=0; $i<N; $i++){
        for($j=0; $j<N; $j++){
            $solutions[$i][$j] = -1;
        }
    }

    $solutions[0][0] = 0;
    $xMove = [2, 1, -1, -2, -2, -1, 1, 2];
    $yMove = [1, 2, 2, 1, -1, -2, -2, -1];

    if(solveRecursively(0,0,1,$solutions, $xMove, $yMove)){
        printSolutions($solutions);
    }else{
        echo "No solutions.\n";
    }

}

solveKT();