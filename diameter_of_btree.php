<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/9/11
 * Time: 11:09
 * 计算一个二叉树的宽度，二叉树的宽度定义为最远的两个节点之间经过的节点个数。
 * O(n)
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
    private $root;

    public function __construct($root){
        $this->root = $root;
    }

    public function getRoot(){
        return $this->root;
    }

    public function diameter($root){
        if($root == null){
            return 0;
        }
        $lh = $this->height($root->left);
        $rh = $this->height($root->right);
        $ld = $this->diameter($root->left);
        $rd = $this->diameter($root->right);
        return max($lh+$rh+1, max($ld, $rd));

    }

    public function height($root){
        if($root==null){
            return 0;
        }
        return max($this->height($root->left), $this->height($root->right)) + 1;
    }
}

$n2 = new Node(2, new Node(4), new Node(5));
$root = new Node(1, $n2, new Node(3));
$tree = new Tree($root);
echo $tree->diameter($tree->getRoot()).PHP_EOL;


