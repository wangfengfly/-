<?php
/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/6/16
 * Time: 15:32
 */

class TrieNode{
    public $children = array();
    public $isLeaf = false;
}

class Trie{
    public $root;

    public function __construct(){
        $this->root = new TrieNode();
    }
    /*
     * 将字符串插入到trie树中
     */
    public function insert($str){
        $len = strlen($str);
        $crawler = $this->root;
        for($i=0; $i<$len; $i++) {
            $c = $str[$i];
            if ($crawler->children[$c] == null) {
                $node = new TrieNode();
                $crawler->children[$c] = $node;
            }
            $crawler = $crawler->children[$c];
        }
        $crawler->isLeaf = true;
    }
    /*
     * 在trie树中查找字符串
     */
    public function search($str){
        $len = strlen($str);
        $crawler = $this->root;
        for($i=0; $i<$len; $i++){
            $c = $str[$i];
            if($crawler->children[$c] == null){
                return false;
            }
            $crawler = $crawler->children[$c];
        }
        if($i>=$len && $crawler->isLeaf){
            return true;
        }
        return false;
    }
}

$obj = new Trie();
$obj->insert('test');
var_dump($obj->search('abcd'));