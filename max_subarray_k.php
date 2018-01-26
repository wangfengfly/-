<?php
/**
 * Author: wangfeng
 * Date: 2018/1/25
 * Time: 19:14
 * 给定一个数组，求该数组中各个大小为k的连续子数组的最大值
 */

/**
 * 第一种解法
 * @param array $arr
 * @param $k
 * 最好情况O(n)
 * 最差O(nk)
 */
function find(array $arr, $k){
    $n = count($arr);
    if($n<$k){
        echo max($arr).PHP_EOL;
        return;
    }

    $max = array('val'=>PHP_INT_MIN, 'index'=>-1);
    for($i=0; $i<$k; $i++){
        if($arr[$i] >= $max['val']){
            $max['val'] = $arr[$i];
            $max['index'] = $i;
        }
    }
    echo $max['val'].' ';

    for($i=$k; $i<$n; $i++){
        if($arr[$i] >= $max['val']){
            $max['val'] = $arr[$i];
            $max['index'] = $i;
        }
        if($i-$max['index'] < $k){
            echo $max['val'].' ';
        }else{
            $max['val'] = PHP_INT_MIN;
            $max['index'] = -1;
            for($j=$i; $j>$i-$k; $j--){
                if($arr[$j] > $max['val']){
                    $max['val'] = $arr[$j];
                    $max['index'] = $j;
                }
            }
            echo $max['val'].' ';
        }
    }
    echo "\n";
}

/**
 * Class Deque
 * 第二种解法
 */
class Deque{

    private $data;

    public function __construct(){
        $this->data = array();
    }

    public function isEmpty(){
        return !$this->data;
    }

    public function pushBack($val){
        array_push($this->data, $val);
    }

    public function pushFront($val){
        array_unshift($this->data, $val);
    }

    public function popBack(){
        return array_pop($this->data);
    }

    public function popFront(){
        return array_shift($this->data);
    }

    public function getFront(){
        return array_values($this->data)[0];
    }

    public function getLast(){
        return array_values(array_slice($this->data,-1))[0];
    }

    public function printData(){
        var_dump($this->data);
    }

}

/**
 * @param array $arr
 * @param $k
 * 空间复杂度O(k)
 * 时间复杂度O(n)
 */
function find2(array $arr, $k){
    $n = count($arr);
    if(!$n || $k<=0){
        return;
    }
    if($n <= $k){
        echo max($arr)."\n";
    }

    $deque = new Deque();
    for($i=0; $i<$k; $i++){
        while(!$deque->isEmpty() && $arr[$deque->getLast()]<=$arr[$i]){
            $deque->popBack();
        }
        $deque->pushBack($i);
    }

    for(; $i<$n; $i++){
        echo $arr[$deque->getFront()]." ";
        while(!$deque->isEmpty() && $deque->getFront()<=$i-$k){
            $deque->popFront();
        }
        while(!$deque->isEmpty() && $arr[$deque->getLast()]<=$arr[$i]){
            $deque->popBack();
        }
        $deque->pushBack($i);
    }
    echo $arr[$deque->popFront()]."\n";
}

find(array(1, 2, 3, 1, 4, 5, 2, 3, 6), 3);
find2(array(1, 2, 3, 1, 4, 5, 2, 3, 6), 3);

find(array(8, 5, 10, 7, 9, 4, 15, 12, 90, 13), 4);
find2(array(8, 5, 10, 7, 9, 4, 15, 12, 90, 13), 4);

find(array(1,1,4,8,2,3), 2);
find2(array(1,1,4,8,2,3), 2);

find(array(12, 1, 78, 90, 57, 89, 56), 3);
find2(array(12, 1, 78, 90, 57, 89, 56), 3);

find(array(1,2,3,4,5,6),3);
find2(array(1,2,3,4,5,6),3);

find(array(6,5,4,3,2,1),3);
find2(array(6,5,4,3,2,1),3);