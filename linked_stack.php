<?php

class Node{
    private $val;
    private $next;
    
    public function setVal($val){
        $this->val = $val;
    }
    
    public function setNext($next){
        $this->next = $next;
    }
    
    public function getVal(){
        return $this->val;
    }
    
    public function getNext(){
        return $this->next;
    }
}

class Stack{
    private $head;
    private $size;
    
    public function push($item){
        $node = new Node();
        $node->setVal($item);
        if($this->head == null){    
            $this->head = $node;
        }else{
            $node->setNext($this->head);
            $this->head = $node;
        }
        $this->size++;
    }
    
    public function isEmpty(){
        return $this->head == null;
    }
    
    public function pop(){
        $val = $this->head->getVal();
        $this->head = $this->head->getNext();
        $this->size--;
        return $val;
    }
    
    public function getSize(){
        return $this->size;
    }
}

$stack = new Stack();

for($i=0; $i<10; $i++){
    $stack->push($i);
}
echo $stack->getSize() . "\n";
while(!$stack->isEmpty()){
    echo $stack->pop() . ' ';
}
echo "\n", $stack->getSize(),"\n";
?>