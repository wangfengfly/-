<?php
/**
 * Author: wangfeng
 * Date: 2018/1/4
 * Time: 15:38
 * 数组中前i个元素的和，适合于更新比较少，查询比较多的场合。
 */

class BIT{
    private $tree;

    public function __construct(array $arr){
        if(!$arr){
            return;
        }
        $n = count($arr);
        for($i=0; $i<$n; $i++){
            $this->update($n, $i, $arr[$i]);
        }
    }

    public function update($n, $i, $val){
        $index = $i+1;
        while($index<=$n){
            $this->tree[$index] += $val;
            $index += $this->lowVal($index);
        }
    }

    public function getSum($i){
        if($i>count($this->tree)){
            $i=count($this->tree);
        }

        $res = 0;
        while($i>0){
            $res += intval($this->tree[$i]);
            $i -= $this->lowVal($i);
        }
        return $res;
    }

    private function lowVal($x){
        return ($x&(-$x));
    }
}

$bit = new BIT(array(1,2,5,3,7));
var_dump($bit->getSum(1));
var_dump($bit->getSum(6));