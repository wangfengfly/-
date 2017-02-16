<?php
/*
BST类
author: wangfeng
desc: php的二叉树实现
*/

require_once(dirname(__FILE__) . '/Node.php');

class BST{
    private $data;
    private $root;
    
    public function __construct($data){
        $this->data = $data;
     
    }
    
    public function buildTree(){
        $i = 1;
        foreach($this->data as $k => $v){
            if($i == 1){
                $this->root = new Node($k, $v);               
            }else{
                $this->insertToBst($this->root, $k);
            }
            $i++;
        }
      
    }
    
    private function insertToBst($root, $k){
       
        if($k == $root->key){
            $root->value = $this->data[$k];
        }else if($k < $root->key){
            if($root->left == null){
                $n = new Node($k, $this->data[$k]);
                $root->left = $n;
            }else{
                $this->insertToBst($root->left, $k);
            }
        }else{
            if($root->right == null){
                $n = new Node($k, $this->data[$k]);
                $root->right = $n;
            }else{
                $this->insertToBst($root->right, $k);
            }
        }
    }
    
    public function printTree(){
        var_dump($this->root);
    }
    
}

$arr = array('4' => 'abc', '5' => 'aaa', '1' => 'bbb', '2' => 'ccc', '6' => 'ddd');
$b = new BST($arr);
$b->buildTree();
$b->printTree();



?>