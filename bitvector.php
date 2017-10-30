<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/30
 * Time: 14:30
 */

class BitArray{
    private $bitarr;

    public function get($val){
        $pos = ($val>>5);
        $bit = ($val%32);
        if($this->bitarr[$pos] & (1<<$bit)){
            return true;
        }
        return false;
    }

    public function set($val){
        $pos = ($val>>5);
        $bit = ($val%32);
        $this->bitarr[$pos] = ($this->bitarr[$pos] | (1<<$bit));
    }

    public function vardump(){
        var_dump($this->bitarr);
    }
}

$arr = array(1,32,5,6,1,10,45,45,33,33);
$ba = new BitArray();
for($i=0; $i<count($arr); $i++){
    $num = $arr[$i];
    if($ba->get($num)){
        echo "$num ";
    }else{
        $ba->set($num);
    }
}
echo "\n";

$ba->vardump();