<?php
/**
 * Author: wangfeng
 * Date: 2018/1/26
 * Time: 14:45
 * 不用for,while循环，只使用递归逆转一个栈
 */

require_once('./stack.php');

function reverse(Stack $s, Stack $t){
    if(!$s || !$t){
        return;
    }
    if($s->isEmpty()){
        return;
    }

    $val = $s->pop();
    $t->push($val);
    reverse($s, $t);
}

//test demo
$s = new Stack(10);
for($i=0; $i<10; $i++){
    $s->push($i);
}

$t = new Stack(10);
reverse($s, $t);
while(!$t->isEmpty()){
    echo $t->pop().' ';
}
echo PHP_EOL;