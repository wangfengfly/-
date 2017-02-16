<?php

$l1 = 'ABCD';
$l2 = 'EACB';

function lcs($l1, $l2){
$c1 = strlen($l1);
$c2 = strlen($l2);
$res = array();
if($c1 == 0 || $c2 == 0){
	return 0;
}

for($i = 0; $i <= $c1; $i++){
	$res[$i][0] = 0;
}

for($i = 0; $i <= $c2; $i++){
	$res[0][$i] = 0;
}

for($i = 1; $i <= $c1; $i++){
	for($j = 1; $j <= $c2; $j++){
		if($l1[$i-1] == $l2[$j-1]){
			$res[$i][$j] = $res[$i-1][$j-1] + 1;
		}else{
			$res[$i][$j] = max($res[$i-1][$j], $res[$i][$j-1]);
		}
	}
}

return $res[$c1][$c2];
}

echo lcs($l1, $l2);
