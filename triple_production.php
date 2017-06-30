<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/6/30
 * Time: 10:27
 * Given a stream of integers represented as arr[].
 * For each index i from 0 to n-1, print the multiplication of largest, second largest, third largest element of the subarray arr[0…i]. If i < 2 print -1.
 * Input : arr[] = {1, 2, 3, 4, 5}
Output :-1
-1
6
24
60
 */


function triple_production($arr){
    $n = count($arr);
    for($i=0; $i<$n; $i++){
        if($i<2) {
            echo "-1\n";
        }else if($i==2){
            echo $arr[0]*$arr[1]*$arr[2]."\n";
            if($arr[0]>$arr[1]){
                $max = $arr[0];
                $second_max = $arr[1];
                $exclude = 0;
            }else{
                $max=$arr[1];
                $second_max = $arr[0];
                $exclude = 1;
            }
            if($arr[2] > $max){
                $third_max = $second_max;
                $second_max = $max;
                $max = $arr[2];
            }else{
                if($exclude == 0){
                    $second_max = ($arr[1] > $arr[2]) ? $arr[1] : $arr[2];
                    $third_max = ($arr[1] > $arr[2]) ? $arr[2] : $arr[1];
                }
                if($exclude == 1){
                    $second_max = ($arr[0] > $arr[2]) ? $arr[0] : $arr[2];
                    $third_max = ($arr[0] > $arr[2]) ? $arr[2] : $arr[0];
                }
            }

        }else{
            if($arr[$i] > $max){
                $third_max = $second_max;
                $second_max = $max;
                $max = $arr[$i];
            }else if($arr[$i] > $second_max){
                $third_max = $second_max;
                $second_max = $arr[$i];
            }else if($arr[$i] > $third_max){
                $third_max = $arr[$i];
            }
            echo $max*$second_max*$third_max."\n";
        }
    }
}

$arr = array(1, -2, 3, 4, 5);
triple_production($arr);

