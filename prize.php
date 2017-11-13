<?php
/*
 * 概率抽奖算法
 */

/*
 * 第一种解法
 */
function get_rand($proArr) { 
    $result = ''; 

    //概率数组的总概率精度
    $proSum = array_sum($proArr); 

    //概率数组循环
    foreach ($proArr as $key => $proCur) { 
        $randNum = mt_rand(1, $proSum); 
        if ($randNum <= $proCur) { 
            $result = $key; 
            break; 
        } else { 
            $proSum -= $proCur; 
        } 
    } 
    unset ($proArr); 

    return$result; 
}

$prize_arr = array( 
    '0' => array('id'=>1,'prize'=>'平板电脑','v'=>1), 
    '1' => array('id'=>2,'prize'=>'数码相机','v'=>5), 
    '2' => array('id'=>3,'prize'=>'音箱设备','v'=>10), 
    '3' => array('id'=>4,'prize'=>'4G优盘','v'=>12), 
    '4' => array('id'=>5,'prize'=>'10Q币','v'=>22), 
    '5' => array('id'=>6,'prize'=>'下次没准就能中哦','v'=>50), 
); 


/*
 * 第二种解法
 */
function get_rand2($proArr){
	global $prize_arr;

	$result = '';
	$prefix = array();
	$sum = 0;
	foreach($proArr as $k=>$v){
		$sum += $v;
		$prefix[] = $sum;
	}
	
	$sum = array_sum($proArr);
	$r = rand(1, $sum);
	foreach($prefix as $k=>$v){
		if($r<=$v){
			var_dump($prize_arr[$k]['prize']);
			return;
		}
	}
}
  

foreach ($prize_arr as $key => $val) { 
    $arr[$val['id']] = $val['v']; 
} 

$rid = get_rand2($arr); //根据概率获取奖项id