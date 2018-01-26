<?php
/**
 * Author: wangfeng
 * Date: 2017/12/20
 * Time: 11:27
 * 表达式求值算法,只适用于带括号的表达式
 */

function isOperator($c){
    if(in_array($c, array('+','-','*','/','(',')'))){
        return true;
    }
    return false;
}

function isOperand($c){
    return is_numeric($c);
}

function operate($op1, $op2, $op){
    $op1 = intval($op1);
    $op2 = intval($op2);
    switch($op){
        case '+':
            return $op1+$op2;
        case '-':
            return $op1-$op2;
        case '*':
            return $op1*$op2;
        case '/':
            return $op1/$op2;
        default:
            return false;
    }
}

function compute($str){
    if(!$str){
        return false;
    }

    $operator_stack = new SplStack();
    $operand_stack = new SplStack();
    $len = strlen($str);
    for($i=0; $i<$len; $i++){
        $c = $str[$i];
        if($c==')'){
            while(!$operator_stack->isEmpty()){
                if($operator_stack->top()=='('){
                    $operator_stack->pop();
                }else {
                    $op2 = $operand_stack->pop();
                    $op1 = $operand_stack->pop();
                    $op = $operator_stack->pop();
                    $res = operate($op1, $op2, $op);
                    $operand_stack->push($res);
                }
            }

        }else{
            if(isOperator($c)){
                $operator_stack->push($c);
            }else if(isOperand($c)){
                $operand_stack->push($c);
            }
        }
    }

    return $operand_stack->pop();
}

$str = '(3+5*8)*(4+5)';
var_dump(compute($str));

$str = '(3+8/2)*(4+5*3)';
var_dump(compute($str));

$str = '(3+8/6)*(4+5*3)';
var_dump(compute($str));

var_dump(compute('(8/6)'));

var_dump(compute('(3*(4+5))+(5+2*3)'));