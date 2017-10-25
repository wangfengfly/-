<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/25
 * Time: 15:41
 */

function buildSuffixArray($str){
    if(!$str){
        return;
    }
    $suffixes = array();
    $n = strlen($str);
    for($i=0; $i<$n; $i++){
        $suffixes[$i] = substr($str, $i);
    }
    asort($suffixes);
    $suffixArray = array();
    foreach($suffixes as $k=>$v){
        $suffixArray[] = $k;
    }
    return $suffixArray;
}
/*
 * O(mlgn)
 */
function findPattern($str, $pat){
    $suffixArray = buildSuffixArray($str);
    $n = count($suffixArray);
    $m = strlen($pat);
    $l = 0;
    $h = $n-1;
    while($l<$h){
        $mid = $l + ceil(($h-$l)/2);
        $substr = substr($str, $suffixArray[$mid], $m);
        if($substr==$pat){
            echo "$pat is found at $suffixArray[$mid]\n";
            return;
        }else if($substr > $pat){
            $h = $mid-1;
        }else{
            $l = $mid+1;
        }
    }
    return false;
}


$res = findPattern('hello world', 'ello');
if($res === false){
    echo "not found\n";
}
