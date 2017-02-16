
<?php
/*
Node类
author: wangfeng
*/

class Node{
    private $key;
    private $value;
    private $left;
    private $right;
    
    public function __construct($k, $v){
        $this->key = $k;
        $this->value = $v;
    }
    /*
     * 魔术方法实现get和set
    */
    public function __get($property){
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }
    
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
          $this->$property = $value;
        }
        return $this;
    }
}


?>