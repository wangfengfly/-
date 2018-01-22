<?php
/**
 * Author: wangfeng
 * Date: 2018/1/22
 * Time: 14:35
 * 约瑟夫环求解，n个节点，数到m退出，求最后留下的节点编号。
 *
 */

class Node{
    public $value;
    public $next;

    public function __construct($val){
        $this->value = $val;
    }
}

class LinkedList{
    public $head;
    public $n;

    public function __construct($n){
        $this->n = $n;
        $this->head = new Node(0);
        $cur = $this->head;

        for($i=1; $i<=$n-1; $i++){
            $_node = new Node($i);
            $cur->next = $_node;
            $cur = $cur->next;
        }

        $cur->next = $this->head;
    }

    /**
     * @param $m
     * @return mixed
     * n个节点，数到m退出，返回最后留下的节点编号
     */
    public function calc($m){
        if($m == 1){
            return $this->n-1;
        }
        $cur = $this->head;
        $pre = null;

        while($cur->next != $cur){
            for($i=0; $i<$m-1; $i++){
                $pre = $cur;
                $cur = $cur->next;
            }
            $pre->next = $cur->next;
            unset($cur);
            $cur = $pre->next;
        }
        return $cur->value;
    }

    /**
     * @param $m 数到m退出
     * @param $k 从编号为k的节点开始
     * 返回最后留下的节点编号
     */
    public function calc2($m, $k){
        if($m == 1){
            return ($k+$this->n-1) % $this->n;
        }
        $cur = $this->head;
        $pre = null;
        for($i=0; $i<$k; $i++){
            $pre = $cur;
            $cur = $cur->next;
        }

        while($cur->next != $cur){
            for($i=0; $i<$m-1; $i++){
                $pre = $cur;
                $cur = $cur->next;
            }
            $pre->next = $cur->next;
            unset($cur);
            $cur = $pre->next;
        }
        return $cur->value;
    }

}

$ll = new LinkedList(5);
var_dump($ll->calc(3));
$ll = new LinkedList(5);
var_dump($ll->calc2(3,2));
$ll = new LinkedList(5);
var_dump($ll->calc(5));
$ll = new LinkedList(5);
var_dump($ll->calc(1));
$ll = new LinkedList(5);
var_dump($ll->calc2(1,2));
