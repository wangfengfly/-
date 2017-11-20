<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/20
 * Time: 14:38
 * 给定两个数X和Y，找到最小的X，使得:
 * X+Y=s
 * X ^ Y = xor
 */

function find($s, $xor){
    $x = intval(($s-$xor)/2);
    $y = $s - $x;
    echo "x=$x, y=$y\n";
}

find(17, 13);
find(1870807699, 259801747);
find(1639, 1176);