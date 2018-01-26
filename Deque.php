<?php

/**
 * Author: wangfeng
 * Date: 2018/1/26
 * Time: 11:00
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

$deque = new Deque();
$deque->pushBack(1);
$deque->pushBack(2);
$deque->pushBack(3);
$deque->printData();

$deque->popBack();
$deque->printData();

$deque->pushFront(3);
$deque->printData();

$deque->popFront();
$deque->printData();

var_dump($deque->getFront());
var_dump($deque->getLast());