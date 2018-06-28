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


}

$t = new Tree(0);
$root = $t->root;
$root->left = new Node(1);
$root->right = new Node(2);

$root->left->left = new Node(3);
$root->right->left = new Node(5);

var_dump($t->levels());
var_dump($t->levels2($root));