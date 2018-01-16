<?php
/**
 * Author: wangfeng
 * Date: 2018/1/16
 * Time: 10:29
 *
 * 计算二叉树的直径，直径定义为两个叶子之间的最长路径上节点个数。
 */

class Node{
    public $data;
    public $left;
    public $right;

    public function __construct($data, $left=null, $right=null){
        $this->data = $data;
        $this->left = $left;
        $this->right = $right;
    }
}

class Tree{
    public $root;

    public function __construct(Node $root){
        $this->root = $root;
    }

    public function height($root){
        if(!$root){
            return 0;
        }
        if(!$root->left && !$root->right){
            return 1;
        }
        return 1+max($this->height($root->left), $this->height($root->right));
    }

    public function diameter($root){
        if(!$root){
            return 0;
        }
        if(!$root->left && !$root->right){
            return 1;
        }
        return 1+$this->height($root->left)+$this->height($root->right);
    }

    public function maxDiameter(){
        return max($this->diameter($this->root->left), $this->diameter($this->root->right),
            $this->diameter($this->root));
    }
}

$root = new Node(1);
$n2 = new Node(2);
$n3 = new Node(3);
$root->left = $n2;
$root->right = $n3;
$n4 = new Node(4);
$n6 = new Node(6);
$n2->left = $n4;
$n2->right = $n6;
//$n8 = new Node(8);
//$n3->right = $n8;
$n5 = new Node(5);
$n4->right = $n5;
$n7 = new Node(7);
$n6->left = $n7;
//$n9 = new Node(9);
//$n8->left = $n9;

$n10 = new Node(10);
$n5->left = $n10;
$n11 = new Node(11);
$n7->right = $n11;

$tree = new Tree($root);
var_dump($tree->maxDiameter());

