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
    public function getkMinSum($root, $k, &$count){
        if($root == null){
            return 0;
        }
        if($count >= $k){
            return 0;
        }
        $res = $this->getkMinSum($root->left, $k, $count);
        if($count >= $k){
            return $res;
        }
        $count++;
        $res += $root->key;
        if($count >= $k){
            return $res;
        }
        return $res + $this->getkMinSum($root->right, $k, $count);

    }
    
    /*
     * root为根，前k个最小元素之和
     * 第二种解法
     */
    public function getkMinSum2($root, &$k){
        if($root == null || $k<=0){
            return 0;
        }

        $res = $this->getkMinSum2($root->left, $k);
        if($k<=0){
            return $res;
        }
        $res += $root->key;
        $k--;
        if($k<=0){
            return $res;
        }
        $res += $this->getkMinSum2($root->right, $k);
        return $res;
    }

    public function getRoot(){
        return $this->root;
    }
    /*
     * 垂直打印二叉树
     *
     */
    public function printTreeVertically($root){
        if($root == null){
            return;
        }
        $map = array();
        $q = new SplQueue();
        $q->enqueue(array($root, 0));
        while(!$q->isEmpty()){
            $temp = $q->dequeue();
            $node = $temp[0];
            $hd = $temp[1];
            $map[$hd][] = $node->key;
            if($node->left != null){
                $q->enqueue(array($node->left, $hd-1));
            }
            if($node->right != null){
                $q->enqueue(array($node->right, $hd+1));
            }
        }

        foreach($map as $hd => $list){
            echo "$hd: ". implode(',', $list) .PHP_EOL;
        }
    }

    /*
     * 非递归后序遍历二叉树
     */
    public function postTraverse($root){
        if($root == null){
            return;
        }
        $stack1 = new SplStack();
        $stack2 = new SplStack();

        $stack1->push($root);
        while(!$stack1->isEmpty()){
            $temp = $stack1->pop();
            $stack2->push($temp);
            if($temp->left){
                $stack1->push($temp->left);
            }
            if($temp->right){
                $stack1->push($temp->right);
            }
        }
        while(!$stack2->isEmpty()){
            $temp = $stack2->pop();
            echo $temp->key . ' ';
        }
        echo PHP_EOL;
    }

    /*
     * 非递归先序遍历二叉树
     */
    public function preOrderTraverse($root){
        if($root == null){
            return;
        }
        $stack = new SplStack();
        $stack->push($root);
        while(!$stack->isEmpty()){
            $temp = $stack->pop();
            echo $temp->key . ' ';
            if($temp->right){
                $stack->push($temp->right);
            }
            if($temp->left){
                $stack->push($temp->left);
            }
        }
        echo PHP_EOL;
    }

    /*
     * 非递归中序遍历
     */
    public function inOrderTraverse($root){
        if($root == null){
            return;
        }
        $stack = new SplStack();
        $stack->push($root);
        while(!$stack->isEmpty()){
            $temp = $stack->pop();
            if($temp->left==null && $temp->right==null || (!$stack->isEmpty() && $temp->right===$stack->top())
                || $temp->left == $_temp){
                $_temp = $temp;
                echo $temp->key . ' ';
                continue;
            }else if($temp->left || $temp->right){
                if($temp->right) {
                    $stack->push($temp->right);
                }
                $stack->push($temp);
                if ($temp->left) {
                    $stack->push($temp->left);
                }
            }
        }
    }

    /*
     * 中序遍历
     * 第二种解法
     */
    public function inOrderTraverse2($root){
        if($root == null){
            return;
        }
        $stack = new SplStack();
        $current = $root;
        while($current || !$stack->isEmpty()){
            if($current) {
                $stack->push($current);
                $current = $current->left;
            }
            else{
                $temp = $stack->pop();
                echo $temp->key . ' ';
                if($temp->right) {
                    $current = $temp->right;
                }
            }
        }
    }
}

$arr = array('4' => 'abc', '8' => 'aaa', '7' => 'aaa',  '2' => 'ccc', '3'=>'', '1' => 'bbb', '6' => 'ddd', '9'=>'', '5'=>'', '10'=>'');
$b = new BST($arr);
$b->buildTree();
//$b->printTree();
$count = 0;
echo $b->getkMinSum($b->getRoot(), 4, $count) .PHP_EOL;

$k = 4;
echo $b->getkMinSum2($b->getRoot(), $k) . PHP_EOL;

$b->printTreeVertically($b->getRoot());
$b->postTraverse($b->getRoot());
$b->preOrderTraverse($b->getRoot());
$b->inOrderTraverse2($b->getRoot());

?>