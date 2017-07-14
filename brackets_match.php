<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/7/14
 * Time: 18:35
 */

class Stack{
    private $top;
    private $data;

    public function __construct(){
        $this->top = -1;
        $this->data = array();
    }

    public function isEmpty(){
        return $this->top == -1;
    }

    public function push($val){
        $this->top+=1;
        $this->data[$this->top] = $val;
    }

    public function pop(){
        if($this->isEmpty()){
            return null;
        }
        $val = $this->data[$this->top];
        $this->top--;
        return $val;
    }

    public function getTop(){
        return $this->data[$this->top];
    }
}


$str = "[((A{B(C)})D)";

function match($str){
    $len = strlen($str);
    $stack = new Stack();
    for($i=0; $i<$len; $i++){
        if(in_array($str[$i], array('(', '{', '['))){
            $stack->push($str[$i]);
        }else if(in_array($str[$i], array(')', '}', ']'))){
            if($str[$i] == ')' && $stack->getTop() == '(' ||
                $str[$i] == ']' && $stack->getTop() == '[' ||
                $str[$i] == '}' && $stack->getTop() == '{'){
                $stack->pop();
            }else{
                return false;
            }
        }
    }
    if($stack->isEmpty()){
        return true;
    }
    return false;
}

var_dump(match($str));