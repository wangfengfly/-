<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/9/26
 * Time: 10:34
 * 定义一个链表，每个节点除了next指针，还有一个random指针，指向链表中任意的节点或者为null
 * 实现一个深拷贝操作，对该链表执行深拷贝操作
 * O(n)
 * 1->2->3->4
 * 1->1'->2->2'->3->3'->4->4'
 * 1'->2'->3'->4'
 */

class Node{
    private $next;
    private $data;
    private $random;

    public function __construct($next, $data, $random){
        $this->next = $next;
        $this->data = $data;
        $this->random = $random;
    }

    public function getNext(){
        return $this->next;
    }

    public function getData(){
        return $this->data;
    }

    public function getRandom(){
        return $this->random;
    }

    public function setNext($next){
        $this->next = $next;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function setRandom($random){
        $this->random = $random;
    }
}

class LinkedList{
    private $head;

    public function __construct($head){
        $this->head = $head;
    }

    public function getHead(){
        return $this->head;
    }

    public function deepcopy(){
        if($this->head == null){
            return null;
        }
        $p = $this->head;
        while($p){
            $dup = new Node($p->getNext(), $p->getData(), null);
            $p->setNext($dup);
            $p = $dup->getNext();
        }

        $p = $this->head;
        while($p){
            $dup = $p->getNext();
            if($p->getRandom()!=null) {
                $dup->setRandom($p->getRandom()->getNext());
            }
            $p = $dup->getNext();
        }

        $p = $this->head;
        $head = $p->getNext();
        $q = $head;
        $linkedlist2 = new LinkedList($head);
        while($p){
            $p->setNext($q->getNext());
            $p = $p->getNext();
            if($p) {
                $q->setNext($p->getNext());
            }
            $q = $q->getNext();
        }
        return $linkedlist2;
    }
}

$n4 = new Node(null, 4, null);
$n3 = new Node($n4, 3, null);
$n2 = new Node($n3, 2, $n4);
$n1 = new Node($n2, 1, $n3);
$head1 = new LinkedList($n1);

echo 'linkedlist:'.PHP_EOL;
$p = $head1->getHead();
while($p->getNext()){
    echo $p->getData().'->';
    $p=$p->getNext();
}
echo $p->getData().PHP_EOL;

$head2 = $head1->deepcopy();
echo 'linkedlist 2:'.PHP_EOL;
$p = $head2->getHead();
while($p->getNext()){
    echo $p->getData().'->';
    $p=$p->getNext();
}
echo $p->getData().PHP_EOL;
