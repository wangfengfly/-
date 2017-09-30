<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/9/30
 * Time: 16:20
 * 给定一个整数数组，找到它的子数组，使得该子数组所有元素的异或值最大
 */

class Node{
    public $data;
    public $children;

    public function __construct(){
        $this->data = 0;
        $this->children = array();
    }

}

class Trie{
    private $root;
    const INT_SIZE = 32;

    public function __construct(){
        $this->root = new Node();
    }

    public function insert($pre_xor){
        $temp = $this->root;
        //两种遍历方式都可以
        //for($i=self::INT_SIZE-1; $i>=0; $i--){
        for($i=0;$i<self::INT_SIZE; $i++){
            $val = ($pre_xor & (1<<$i)) ? 1 : 0;
            if($temp->children[$val] == null){
                $temp->children[$val] = new Node();
            }
            $temp = $temp->children[$val];
        }
        $temp->data = $pre_xor;
    }

    public function query($pre_xor){
        $temp = $this->root;
        //for($i=self::INT_SIZE-1; $i>=0; $i--){
        for($i=0;$i<self::INT_SIZE;$i++){
            $val = ($pre_xor & (1<<$i)) ? 1 : 0;
            if($temp->children[1-$val] != null){
                $temp = $temp->children[1-$val];
            }else if($temp->children[$val] != null){
                $temp = $temp->children[$val];
            }
        }
        return $pre_xor ^ ($temp->data);
    }
}


function largest_xor(array $input){
    if($input == null){
        return;
    }
    $tri = new Trie();
    $tri->insert(0);
    $n = count($input);
    $pre_xor = 0;
    $max_xor = -1;
    for($i=0; $i<$n; $i++){
        $pre_xor = ($pre_xor ^ $input[$i]);
        $tri->insert($pre_xor);
        $val = $tri->query($pre_xor);
        $max_xor = max($max_xor, $val);
    }

    return $max_xor;
}

$input = array(8,1,2,12);
$input = array(4,6);
var_dump(largest_xor($input));