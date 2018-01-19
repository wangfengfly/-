<?php
/**
 * Author: wangfeng
 * Date: 2018/1/19
 * Time: 14:52
 */

class Node{
    public $data;
    public $next;
}

class LinkedList{
    private $head;

    public function __construct($head){
        $this->head = $head;
    }

    public function getHead(){
        return $this->head;
    }

    public function detectCycle(){
        if($this->head==null || $this->head->next==null){
            return false;
        }
        $slow = $this->head;
        $fast = $this->head;
        $slow = $slow->next;
        $fast = $fast->next->next;

        while($slow != $fast){
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        if($slow == $fast){
            return true;
        }
        return false;
    }

    public function findFirst(){
        if($this->detectCycle()){
            $slow = $this->head->next;
            $fast = $this->head->next->next;
            while($slow != $fast){
                $slow = $slow->next;
                $fast = $fast->next->next;
            }
            $slow = $this->head;
            while($slow->next != $fast->next){
                $slow = $slow->next;
                $fast = $fast->next;
            }
            $fast->next = null;
        }
        return $this->head;
    }
}

$n1 = new Node();
$n1->data = 1;
$n2 = new Node();
$n2->data = 2;
$n3 = new Node();
$n3->data = 3;
$n4 = new Node();
$n4->data = 4;
$n5 = new Node();
$n5->data = 5;
$n6 = new Node();
$n6->data = 6;

$n1->next = $n2;
$n2->next = $n3;
$n3->next = $n4;
$n4->next = $n5;
$n5->next = $n6;
$n6->next = $n3;

$list = new LinkedList($n1);

var_dump($list->detectCycle());
var_dump($list->getHead());
var_dump($list->findFirst());