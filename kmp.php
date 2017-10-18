<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/18
 * Time: 16:22
 */

function computeLps($pat){
    $lps = array();
    $m = strlen($pat);
    $lps[0] = 0;
    $len = 0;
    $i = 1;
    while($i<$m){
        if($pat[$i] == $pat[$len]){
            $len++;
            $lps[$i] = $len;
            $i++;
        }else{
            if($len!=0){
                $len = $lps[$len-1];
            }else{
                $lps[$i] = 0;
                $i++;
            }
        }
    }
    return $lps;
}

function kmp($str, $pat){
    if(!$str || !$pat){
        return;
    }
    $lps = computeLps($pat);
    $n = strlen($str);
    $m = strlen($pat);
    $i = 0;
    $j = 0;
    while($i<$n){
        if($str[$i] == $pat[$j]){
            $i++;
            $j++;
        }
        if($j == $m){
            $p = $i - $m;
            echo "found $pat at position: $p\n";
            $j = $lps[$j-1];
        }else if($i<$n && $str[$i]!=$pat[$j]){
            if($j!=0) {
                $j = $lps[$j - 1];
            }else{
                $i++;
            }
        }
    }
}

$str = "ABABDABACDABABCABAB";
$pat = "ABABCABAB";
kmp($str, $pat);

$str = "AAAAABAAABA";
$pat = "AA";
kmp($str, $pat);