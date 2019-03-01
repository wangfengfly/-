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

    public function __construct(array $data=[]){
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

    /**
     * @return array|void
     * 非递归中序遍历更优雅的实现
     * 
     */
    public function preOrder2(){
        if(!$this->root){
            return;
        }

        $stack = [];
        $res = [];
        array_push($stack, $this->root);
        while($stack){
            $temp = array_pop($stack);
            $res[] = $temp->data;
            if($temp->right){
                array_push($stack, $temp->right);
            }
            if($temp->left){
                array_push($stack, $temp->left);
            }
        }
        return $res;
    }

    public function preOrder(){
        if(!$this->root){
            return;
        }

        $res = [];

        $temp = $this->root;
        $stack = [];
        array_push($stack, $temp);
        while($stack){
            $temp = $stack[count($stack)-1];
            $res[] = $temp->data;
            if($temp->left && $temp->right){
                array_pop($stack);
                array_push($stack, $temp->right);
                array_push($stack, $temp->left);
            }else if($temp->left){
                array_pop($stack);
                array_push($stack, $temp->left);
            }else if($temp->right){
                array_pop($stack);
                array_push($stack, $temp->right);
            } else{
                array_pop($stack);
            }
        }
        return $res;
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

$tree = new Tree();
$node5 = new Node(null, null, 5);
$node6 = new Node(null, null, 6);
$node4 = new Node($node5, $node6, 4);
$node2 = new Node(null, $node4, 2);

$node10 = new Node(null, null, 10);
$node9 = new Node($node10, null, 9);
$node8 = new Node(null, null, 8);
$node7 = new Node($node8, $node9, 7);
$node3 = new Node($node7, null, 3);

$root = new Node($node2, $node3, 1);
$tree->root = $root;
var_dump($tree->preOrder());
var_dump($tree->preOrder2());