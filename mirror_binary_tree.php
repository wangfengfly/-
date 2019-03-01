<?php
/**
 * Author: wangfeng
 * Date: 2019/2/28
 * Time: 16:23
 * 二叉树镜像操作，自定义实现循环队列
 */

class Node{
    public $left;
    public $right;
    public $data;

    public function __construct($left, $right, $data){
        $this->left = $left;
        $this->right = $right;
        $this->data = $data;
    }
}

class Queue{
    public $data;
    public $maxsize;
    public $head;
    public $tail;

    public function __construct($maxsize){
        $this->maxsize = $maxsize;
        $this->head = $this->tail = 0;
        $this->data = [];
    }

    public function isEmpty(){
        return $this->head == $this->tail;
    }

    public function isFull(){
        return (($this->tail+1)%$this->maxsize) == $this->head;
    }

    public function enQueue($item){
        if($this->isFull()){
            echo "Queue is Full\n";
            return false;
        }

        $this->data[$this->tail] = $item;
        $this->tail = ($this->tail+1)%$this->maxsize;
        return true;
    }

    public function deQueue(){
        if($this->isEmpty()){
            echo "Queue is Empty\n";
            return false;
        }

        $item = $this->data[$this->head];
        $this->head = ($this->head+1)%$this->maxsize;
        return $item;
    }

}

class Tree{

    public $root;
    public $size;

    public function __construct(array $data){
        if(!$data){
            return;
        }

        $n = count($data);
        $this->size = $n;
        $this->root = new Node(null, null, $data[0]);
        $temp = $this->root;
        $q = new Queue($n);
        $q->enQueue($temp);
        $i = 0;
        while(!$q->isEmpty()){
            $temp = $q->deQueue();
            if(($i+1) < $n){
                $left = new Node(null, null, $data[$i+1]);
                $temp->left = $left;
                $q->enQueue($left);
                $i++;
            }
            if(($i+1) < $n){
                $right = new Node(null, null, $data[$i+1]);
                $temp->right = $right;
                $q->enQueue($right);
                $i++;
            }
        }
    }

    public function mirror(){
        $q = new Queue($this->size);
        $q->enQueue($this->root);
        while(!$q->isEmpty()){
            $item = $q->deQueue();
            $temp = $item->left;
            $item->left = $item->right;
            $item->right = $temp;
            if($item->left) {
                $q->enQueue($item->left);
            }
            if($item->right) {
                $q->enQueue($item->right);
            }
        }
    }

    private function _height($node){
        if(!$node){
            return 0;
        }

        return max($this->_height($node->left), $this->_height($node->right))+1;
    }

    /**
     * @return int|mixed
     * 时间复杂度O(n)，因为需要遍历每个节点才能决定最深的路径。
     * 空间复杂度O(lgn),因为每次只需要存储树的从顶点到叶子路径上的节点。
     */
    public function height(){
        return $this->_height($this->root);
    }

}

$tree = new Tree([1,2,3,4,5,6]);
var_dump($tree);
$tree->mirror();
var_dump($tree);
var_dump($tree->height());