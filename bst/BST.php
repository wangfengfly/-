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
    /*
     * 根据$k获取对应的值
     */
    public function getValue($k){
        return $this->_getValue($this->root, $k);
    }
    
    private function _getValue($root, $k){
        if($root == null){
            return null;
        }
        if($k == $root->key){
            return $root->value;
        }else if($k > $root->key){
            return $this->_getValue($root->right, $k);
        }else{
            return $this->_getValue($root->left, $k);
        }
    }
    
    public function printTree(){
        var_dump($this->root);
    }
    /*
     * root为根的树，前k个最小的元素之和
     */
    public function getkSum($root, $k, &$count){
        if($root == null){
            return 0;
        }
        if($count >= $k){
            return 0;
        }
        $res = $this->getkSum($root->left, $k, $count);
        if($count >= $k){
            return $res;
        }
        $count++;
        $res += $root->key;
        if($count >= $k){
            return $res;
        }
        return $res + $this->getkSum($root->right, $k, $count);

    }

    public function getRoot(){
        return $this->root;
    }

}

$arr = array('4' => 'abc', '8' => 'aaa', '7' => 'aaa',  '2' => 'ccc', '3'=>'', '1' => 'bbb', '6' => 'ddd', '9'=>'');
$b = new BST($arr);
$b->buildTree();
$b->printTree();
//echo $b->getValue('2') . "\n";
$count = 0;
echo $b->getkSum($b->getRoot(), 7, $count) .PHP_EOL;



?>