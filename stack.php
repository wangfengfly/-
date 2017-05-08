<?php
/*
 * 容量大小固定的栈
 */
class Stack{
    private $data;
    private $capacity; //栈的容量
    private $size; //当前大小
    
    public function __construct($cap){
        $this->capacity = $cap;
        $this->size = 0;
        $this->data = array();
    }
    
    public function isEmpty(){
        return $this->size == 0;
    }
    
    public function push($item){
        if($this->isFull()){
            exit("stack is full");
        }
        $this->data[$this->size] = $item;
        $this->size++;
    }
    
    public function pop(){
        $this->size--;
        return $this->data[$this->size];
    }
    
    public function isFull(){
        return $this->size >= $this->capacity;
    }
}

$stack = new Stack(10);
for($i=0; $i<10; $i++){
    $stack->push($i);
}

while(!$stack->isEmpty()){
    echo $stack->pop() . ' ';
}

