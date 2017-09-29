<?php
/*
 * 输入两个整数序列。其中一个序列表示栈的push 顺序，判断另一个序列有没有可能是对应的pop 顺序。
 *
 */

function isPop($input, $output){
	$in = count($input);
	$on = count($output);
	if($input==null || $output==null || $in != $on){
		return false;
	}

	$stack = new SplStack();

	$i = 0;
	$j = 0;
	while($i<$in){
		if($input[$i] != $output[$j]){
			if(!$stack->isEmpty()){
				if($stack->top() == $output[$j]){
					$stack->pop();
					$j++;
				}else{
					$stack->push($input[$i]);
					$i++;
				}
			}else{
				$stack->push($input[$i]);
				$i++;
			}
		}else{
			$i++;
			$j++;
		}
	}
	while(!$stack->isEmpty() && $j<$on){
		if($stack->top() == $output[$j]){
			$stack->pop();
			$j++;
		}else{
			return false;
		}
	}
	if(!$stack->isEmpty() || $j<$on){
		return false;
	}

	return true;
}

$input = array(1,2,3,4,5);
$output = array(5,4,3,2,1);
$output = array(3,2,1,4,5);
$output = array(1,2,3,4,5);
$output = array(2,1,3,5,4);
$output = array(3,1,2,4,5);
$output = array(4,2,3,1,5);

var_dump(isPop($input, $output));