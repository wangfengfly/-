<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/27
 * Time: 10:57
 * 计算出小于等于n的所有素数
 */

/*
 * O(nlg(lgn))
 */
function primes($n){
    $primes = array();
    for($i=0; $i<=$n; $i++){
        $primes[$i] = true;
    }
    for($i=2; $i<=$n; $i++){
        if($primes[$i]){
            for($p = $i*$i; $p<=$n; $p+=$i){
                $primes[$p] = false;
            }

        }
    }
    for($i=2; $i<count($primes); $i++){
        if($primes[$i]){
            echo "$i ";
        }
    }
    echo  "\n";
}

primes(30);