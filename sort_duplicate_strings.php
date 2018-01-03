<?php
/**
 * Author: wangfeng
 * Date: 2018/1/3
 * Time: 10:08
 * 基于trie树的字符串排序算法, 可以有重复的字符串
 */

class Node{
    public $children;
    public $index;
    public $count;
    const SIZE = 26;

    public function __construct(){
        for($i=0; $i<self::SIZE; $i++){
            $this->children[$i] = null;
        }
        $this->index = -1;
        $this->count = 0;
    }
}

class Trie{
    private $root;

    public function __construct(){
        $this->root = new Node();
    }

    public function getRoot(){
        return $this->root;
    }

    public function insert($str, $index){
        if(!$str){
            return false;
        }
        $strlen = strlen($str);
        $r = $this->root;
        for($i=0; $i<$strlen; $i++){
            $j = ord($str[$i]) - ord('a');
            if(!$r->children[$j]){
                $r->children[$j] = new Node();
            }
            $r = $r->children[$j];
        }
        $r->index = $index;
        $r->count += 1;
    }

    public function preorder(Node $r, $arr){
        for($i=0; $i<Node::SIZE; $i++){
            if($r->children[$i]){
                $index = $r->children[$i]->index;
                if($index != -1){
                    $count = $r->children[$i]->count;
                    for($j=0; $j<$count; $j++) {
                        echo $arr[$index] . ' ';
                    }
                }
                $this->preorder($r->children[$i], $arr);
            }
        }
    }
}

$arr = array('abc', 'ab', 'abcd','a','xy','xyz','abc', 'xyz','xy');
$t = new Trie();
$n = count($arr);
for($i=0; $i<$n; $i++){
    $t->insert($arr[$i], $i);
}
$t->preorder($t->getRoot(), $arr);