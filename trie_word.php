<?php
/**
 * Author: wangfeng
 * Date: 2018/4/27
 * Time: 15:23
 */
class Node{
    public $isEnd; //单词是否结束
    public $children;
    const CHILD_NUM = 26;

    public function __construct(){
        $this->isEnd = false;
        for($i=0; $i<self::CHILD_NUM; $i++){
            $this->children[$i] = null;
        }
    }

}

class Trie{
    public $root;

    public function __construct(){
        $this->root = new Node();
    }

    /**
     * @param $word
     * 向字典树中添加单词
     */
    public function add($word){
        $len = strlen($word);
        if($len==0 || !$word){
            return;
        }
        $root = $this->root;
        for($i=0; $i<$len; $i++){
            $index = ord($word[$i]) - ord('a');
            if($root->children[$index] == null){
                $root->children[$index] = new Node();
            }
            $root = $root->children[$index];
        }
        if($i>=$len) {
            $root->isEnd = true;
        }
    }

    /**
     * @param $word
     * 检查字典树中是否存在单词
     *
     */
    public function check($word){
        $len = strlen($word);
        if(!$word || $len==0){
            return false;
        }

        $root = $this->root;
        for($i=0; $i<$len; $i++){
            $index = ord($word[$i]) - ord('a');
            if($root->children[$index] == null){
                return false;
            }
            $root = $root->children[$index];
        }
        return $root->isEnd;
    }
}

$t = new Trie();
$t->add('love');
$t->add('hello');
$t->add('world');
$t->add('samsung');
$t->add('sam');
$t->add('am');
$t->add('i');
$str = 'iamsamsamsung';
$str = 'iword';
$str = 'ilovehello';
$len = strlen($str);

$i = 0;
while($i<$len) {
    for ($j = $len-$i; $j > 0; $j--) {
        $substr = substr($str, $i, $j);
        if ($t->check($substr)) {
            echo $substr.' ';
            $i += $j;
            break;
        }
    }
    if($j<=0){
        echo "cannot split sentence\n";
        exit;
    }
}