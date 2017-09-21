<?php
class Node{
    private $data;
    private $next;

    public function __construct($data, $next){
        $this->data = $data;
        $this->next = $next;
    }

    public function getData(){
        return $this->data;
    }

    public function getNext(){
        return $this->next;
    }

    public function setNext($next){
        $this->next = $next;
    }
}

class Link{
    private $head;

    public function __construct($head){
        $this->head = $head;
    }

    public function getHead(){
        return $this->head;
    }
    /*
     * merge with linked list link2
     */
    public function merge(Link $link2){
        if($this->getHead() == null){
            return $link2;
        }
        if($link2->getHead() == null){
            return $this->head;
        }

        $head1 = $this->head;
        $head2 = $link2->getHead();
        if($head1->getData() < $head2->getData()){
            $head = $head1;
            $c = $head1;
            $h1 = $head1->getNext();
            $h2 = $head2;
        }else{
            $head = $head2;
            $c = $head2;
            $h1 = $head2->getNext();
            $h2 = $head1;
        }

        while($h1 && $h2){
            if($h2->getData() < $h1->getData()){
                $c->setNext($h2);
                $c = $h2;
                $h2 = $h2->getNext();
            }else{
                $c->setNext($h1);
                $c = $h1;
                $h1 = $h1->getNext();
            }
        }
        if($h1){
            $c->setNext($h1);
        }
        if($h2){
            $c->setNext($h2);
        }

        $this->head = $head;
    }

    public function printList(){
        $h = $this->head;
        while($h->getNext()){
            echo $h->getData().'->';
            $h = $h->getNext();
        }
        echo $h->getData().PHP_EOL;
    }
}

$n5 = new Node(15, null);
$n4 = new Node(12, $n5);
$n3 = new Node(8, $n4);
$n2 = new Node(6, $n3);
$n1 = new Node(1, $n2);
$link1 = new Link($n1);

$s5 = new Node(14, null);
$s4 = new Node(13, $s5);
$s3 = new Node(10, $s4);
$s2 = new Node(7, $s3);
$s1 = new Node(2, $s2);
$link2 = new Link($s1);


//$link1->merge($link2);
//$link1->printList();

$link2->merge($link1);
$link2->printList();

?>