<?php
/**
 * Author: wangfeng
 * Date: 2018/4/3
 * Time: 11:23
 * 求出数组中比每个元素大的最小的元素
 * 借助二叉搜索树，时间复杂度O(nlgn)
 * c++中STL的set类型底层实现是二叉搜索树
 */
require_once('./stack.php');

class Node{
    public $left;
    public $right;
    public $data;
    public $next; //中序遍历的下一个节点

    public function __construct($val){
        $this->data = $val;
        $this->left = null;
        $this->right = null;
        $this->next = null;
    }
}

class BT{
    public $root;
    public $count;

    public function __construct(array $data){
        $this->count = count($data);
        if($data && $this->count>0){
            $this->root = new Node($data[0]);
            for($i=1; $i<$this->count; $i++){
                $this->insert($data[$i]);
            }
        }
    }

    public function insert($val){
        $cur = $this->root;
        $pre = null;
        while($cur){
            if($val == $cur->data){
                return $cur;
            }else if($val < $cur->data){
                $pre = $cur;
                $cur = $cur->left;
            }else{
                $pre = $cur;
                $cur = $cur->right;
            }
        }
        if($val < $pre->data){
            $new = new Node($val);
            $pre->left = $new;
        }
        if($val > $pre->data){
            $new = new Node($val);
            $pre->right = $new;
        }
    }

    public function find($val){
        $cur = $this->root;
        while($cur){
            if($val == $cur->data){
                return $cur;
            }else if($val < $cur->data){
                $cur = $cur->left;
            }else{
                $cur = $cur->right;
            }
        }
        return $cur;
    }

    public function inOrder(){
        $cur = $this->root;
        $stack = new Stack($this->count);
        $stack->push($cur);
        while($cur->left){
            $cur = $cur->left;
            $stack->push($cur);
        }
        $pre = null;
        while(!$stack->isEmpty()){
            $cur = $stack->pop();
            if($pre){
                $pre->next = $cur;
            }
            $pre = $cur;
            if($cur->right){
                $cur = $cur->right;
                $stack->push($cur);
                while($cur->left){
                    $cur = $cur->left;
                    $stack->push($cur);
                }
            }
        }
    }
}

$arr = array(6, 3, 9, 8, 10, 2, 1, 15, 7);
$arr = array(1,2,3,4,5);
$arr = array(5,4,3,2,1);
$bt = new BT($arr);
$bt->inOrder();
$n = count($arr);
for($i=0; $i<$n; $i++){
    $cur = $bt->find($arr[$i]);
    if($cur->next){
        echo $cur->next->data.' ';
    }else{
        echo '- ';
    }
}
echo PHP_EOL;
