<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/21
 * Time: 9:57
 * 用trie树解决word break问题
 */

class Node{
    const MAX_SIZE = 26;
    public $children;
    public $isEnd;
}

function getNode(){
    $node = new Node();
    for($i=0; $i<Node::MAX_SIZE; $i++){
        $node->children[$i] = null;
    }
    $node->isEnd = false;
    return $node;
}

function insert($key, Node $root){
    $crawl = $root;
    for($i=0; $i<strlen($key); $i++){
        $index = ord($key[$i])-ord('a');
        if(!isset($crawl->children[$index]) || $crawl->children[$index] == null){
            $crawl->children[$index] = getNode();
        }
        $crawl = $crawl->children[$index];
    }
    $crawl->isEnd = true;
}

function search($key, Node $root){
    $len = strlen($key);
    $crawl = $root;
    for($i=0; $i<$len; $i++){
        $index = ord($key[$i])-ord('a');
        if($crawl->children[$index] == null){
            return false;
        }
        $crawl = $crawl->children[$index];
    }
    if($crawl && $crawl->isEnd){
        return true;
    }
    return false;
}

function breaks($str, Node $root, &$result){
    $len = strlen($str);
    //base case
    if($len==0){
        return true;
    }
    $crawl = $root;
    for($i=1; $i<=$len; $i++){
        if(search(substr($str,0, $i),$crawl) && breaks(substr($str,$i,$len-$i),$crawl, $result)){
            $result[] = substr($str, 0, $i).' ';
            return true;
        }
    }
    return false;
}


$dict = array("mobile","samsung","sam", "sung","man","mango", "icecream","and","go","i", "like","ice","cream");
$n=count($dict);
$root = new Node();
for($i=0; $i<$n; $i++){
    insert($dict[$i], $root);
}
$result = array();
breaks("ilikesamsung", $root, $result);
var_dump($result);
