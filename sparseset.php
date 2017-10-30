<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/10/30
 * Time: 16:11
 */

class SparseSet{
    private $dense;
    private $sparse;

    public function __construct()
    {
        $this->dense = array();
        $this->sparse = array();
    }
    /*
     * O(1)
     */
    public function insert($val){
        if($this->search($val) !== false){
            return;
        }
        $this->dense[] = $val;
        $this->sparse[$val] = count($this->dense)-1;
    }
    /*
     * O(1)
     */
    public function search($val){
        $i = $this->sparse[$val];
        if($this->dense[$i] == $val){
            return $i;
        }
        return false;
    }
    /*
     * O(1)
     */
    public function delete($val){
        if($this->search($val) === false){
            return;
        }
        $i = $this->sparse[$val];
        $replace = $this->dense[count($this->dense)-1];
        $this->dense[$i] = $replace;
        $this->sparse[$replace] = $i;
    }

    public function vardump(){
        var_dump($this->dense);
        var_dump($this->sparse);
    }
}

$ss = new SparseSet();
$ss->insert(1);
$ss->vardump();
$ss->insert(10);
$ss->vardump();
$ss->insert(5);
$ss->insert(3);
$ss->insert(5);
$ss->vardump();

$ss->delete(10);
$ss->vardump();

