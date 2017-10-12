<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/12
 * Time: 13:57
 * n皇后 
 */

function isSafe(array $board, $row, $col){
    for($i=0; $i<=$col; $i++){
        if($board[$row][$i]){
            return false;
        }
    }

    $i=$row;
    $j=$col;
    while($i>=0 && $j>=0){
        if($board[$i][$j]){
            return false;
        }
        $i--;
        $j--;
    }

    $i=$row;
    $j=$col;
    $n=count($board);
    while($i<$n && $j>=0){
        if($board[$i][$j]){
            return false;
        }
        $i++;
        $j--;
    }

    return true;
}

function solve(array &$board, $col){
    $n = count($board);
    if($col >= $n){
        return true;
    }
    for($i=0; $i<$n; $i++){
        if(isSafe($board, $i, $col)){
            $board[$i][$col] = 1;
            if(solve($board, $col+1)){
                return true;
            }
            $board[$i][$col] = 0;
        }
    }
    return false;
}

function printboard(array $board){
    $n = count($board);
    for($i=0; $i<$n; $i++){
        for($j=0; $j<$n; $j++){
            echo $board[$i][$j].' ';
        }
        echo "\n";
    }
}

$board = array();
$n=4;
for($i=0; $i<4; $i++){
    for($j=0; $j<4; $j++){
        $board[$i][$j] = 0;
    }
}

solve($board, 0);
printboard($board);


