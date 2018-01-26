<?php
/**
 * Author: wangfeng
 * Date: 2018/1/26
 * Time: 16:17
 * 在同一个数组中实现两个栈结构
 */

class TwoStacks{
    private $data;
    const SIZE = 20;
    private $top1;
    private $top2;

    public function __construct(){
        $this->data = array_fill(0, self::SIZE, 0);
        $this->top1 = -1;
        $this->top2 = count($this->data);
    }

    public function stack1_empty(){
        return $this->top1 == -1;
    }

    public function stack2_empty(){
        return $this->top2 == self::SIZE;
    }

    public function stack1_full(){
        return ($this->top1+1==$this->top2) || ($this->top1+1==self::SIZE);
    }

    public function stack2_full(){
        return ($this->top2-1==$this->top1) || ($this->top2-1<0);
    }

    public function stack1_push($item){
        if($this->stack1_full()){
            return false;
        }
        $this->top1++;
        $this->data[$this->top1] = $item;

    }

    public function stack2_push($item){
        if($this->stack2_full()){
            return false;
        }
        $this->top2--;
        $this->data[$this->top2] = $item;
    }

    public function stack1_pop(){
        if($this->stack1_empty()){
            return false;
        }
        $val = $this->data[$this->top1];
        $this->top1--;
        return $val;
    }

    public function stack2_pop(){
        if($this->stack2_empty()){
            return false;
        }
        $val = $this->data[$this->top2];
        $this->top2++;
        return $val;
    }
}

$st = new TwoStacks();
var_dump($st->stack2_pop());
for($i=0; $i<10; $i++){
    $st->stack1_push($i);
    $st->stack2_push($i);
}

var_dump($st);
var_dump($st->stack1_full());
var_dump($st->stack2_full());

var_dump($st->stack1_pop());
var_dump($st);
var_dump($st->stack1_full());
var_dump($st->stack2_full());
$st->stack2_push(20);
var_dump($st);
var_dump($st->stack1_full());
var_dump($st->stack2_full());