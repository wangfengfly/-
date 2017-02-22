<?php
/*
 * ����һ���ַ���s������Դ���ɾ��һЩ�ַ���ʹ��ʣ�µĴ���һ�����Ĵ���
 * ���ɾ������ʹ�û��Ĵ���أ������Ҫɾ�����ַ����� ��
 *
 */
function min_del($str){
    $rev = strrev($str);
    $len = strlen($str);
    $res = array();
    for($i = 0; $i < $len + 1; $i++){
        $res[0][$i] = 0;
        $res[$i][0] = 0;
    }
    
    for($i = 1; $i < $len + 1; $i++){
        for($j = 1; $j < $len + 1; $j++){
            if($str[$i-1] == $rev[$j-1]){
                $res[$i][$j] = $res[$i-1][$j-1] + 1;
            }else{
                $res[$i][$j] = max($res[$i-1][$j], $res[$i][$j-1]);
            }
        }
    }
    
    return $len - $res[$len][$len];
}

$str = "labcedvxyel";
echo min_del($str) . PHP_EOL;
?>