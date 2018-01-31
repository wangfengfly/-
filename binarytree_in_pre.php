<?php
/**
 * Author: wangfeng
 * Date: 2018/1/31
 * Time: 10:35
 * 根据二叉树的前序和中序遍历序列，构造对应的二叉树
 */

class Node{
    public $data;
    public $left;
    public $right;

    public function __construct($data){
        $this->data = $data;
    }
}

function build($in, $pre, $start, $end){
    if($start > $end){
        return null;
    }
    static $preIndex = 0;
    $data = $pre[$preIndex++];
    $root = new Node($data);
    if($start == $end){
        return $root;
    }
    $inIndex = array_search($data, $in);
    $root->left = build($in, $pre, $start, $inIndex - 1);
    $root->right = build($in, $pre, $inIndex + 1, $end);
    return $root;
}

$in = array(4,5,3,6,7,1);
$pre = array(6,5,4,3,7,1);
var_dump(build($in, $pre, 0, count($in)-1));