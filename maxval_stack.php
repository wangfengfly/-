<?php
/**
 * Author: wangfeng
 * Date: 2019/3/5
 * Time: 11:10
 * O(1) 时间和空间复杂度，找到栈的最大值
 */

class Stack{
    public $data;
    public $maxval;

    public function __construct(){
        $this->data = [];
        $this->maxval = null;
    }

    public function push($x){
        if($x <= $this->maxval){
            array_push($this->data, $x);
        }else{
            array_push($this->data, 2*$x-$this->maxval);
            $this->maxval = $x;
        }
    }

    public function pop(){
        if(!$this->data){
            return false;
        }
        $top = $this->data[count($this->data)-1];
        if($top < $this->maxval){
            return array_pop($this->data);
        }
        $poped = $this->maxval;
        $this->maxval = 2*$this->maxval-$top;
        return $poped;
    }
}

$stack = new Stack();
$stack->push(1);
var_dump($stack->maxval);
$stack->push(6);
var_dump($stack->maxval);
$stack->push(3);
var_dump($stack->maxval);
$stack->push(9);
var_dump($stack->maxval);
$stack->push(2);
var_dump($stack->maxval);

var_dump($stack->pop());
var_dump($stack->pop());
var_dump($stack->maxval);