<?php
/**
 * Author: wangfeng
 * Date: 2018/6/28
 * Time: 18:32
 */

class Node{
    public $data;
    public $left;
    public $right;

    public function __construct($data, $left=NULL, $right=NULL){
        $this->data = $data;
        $this->left = $left;
        $this->right = $right;
    }
}

class Tree{
    public $root;

    public function __construct($rootVal){
        $this->root = new Node($rootVal);

    }

    /**
     * @return int
     * 层次遍历过程中计算树的高度
     */
    public function levels(){
        $queue = [];
        $levels = 0;
        array_push($queue, $this->root);
        //excellent coding
        while($queue){
            $size = count($queue);
            while($size){
                $ele = array_shift($queue);
                if($ele->left){
                    array_push($queue, $ele->left);
                }
                if($ele->right){
                    array_push($queue, $ele->right);
                }
                $size--;
            }
            $levels++;
        }
        return $levels;
    }

    public function levels2($root){
        if(!$root){
            return 0;
        }
        return max($this->levels2($root->left), $this->levels2($root->right))+1;
    }

    /**
     * @param $node1
     * @param $node2
     * @return bool
     * 判断两个节点是否是堂兄弟
     * 堂兄弟定义：两个节点在同一层，而且父节点不同。
     * 时间复杂度O(n) 空间复杂度O(n)
     */
    public function isCousin($node1, $node2){
        $node = new Node(-1);
        $queue = [];
        array_push($queue, $this->root);
        $node1p = $node2p = null;
        while($queue){
            $size = count($queue);
            while($size){
                $val = array_shift($queue);
                if($val->left){
                    array_push($queue, $val->left);
                }
                if($val->right){
                    array_push($queue, $val->right);
                }
                if($val->left === $node1 || $val->right === $node1){
                    $node1p = $val;
                }
                if($val->left === $node2 || $val->right === $node2){
                    $node2p = $val;
                }
                $size--;
            }
            if($node1p && $node2p){
                if($node1p === $node2p){
                    return false;
                }else{
                    return true;
                }
            }else if($node1p && !$node2p || !$node1p && $node2p){
                return false;
            }
        }
    }


}

$t = new Tree(0);
$root = $t->root;
$root->left = new Node(1);
$root->right = new Node(2);

$root->left->left = new Node(3);
$root->right->left = new Node(5);

var_dump($t->levels());
var_dump($t->levels2($root));

var_dump($t->isCousin($root->left, $root->right));
var_dump($t->isCousin($root->left->left, $root->right->left));
var_dump($t->isCousin($root, $root->left));