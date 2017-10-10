<?php
/*
 * time complexity O(n)
 */
class UnionFind{
    private $parent;

    public function __construct($n)
    {
        $this->parent  = array();
        for($i=0; $i<$n; $i++){
            $this->parent[$i] = $i;
        }
    }

    public function find($x){
        if($this->parent[$x] != $x){
            return $this->find($this->parent[$x]);
        }

        return $x;
    }

    public function union($x, $y){
        $px = $this->find($x);
        $py = $this->find($y);

        if($px !== $py){
            $this->parent[$px] = $y;
        }
    }
}

$uf =new UnionFind(5);
$uf->union(0,1);
$uf->union(1,2);
$uf->union(2,3);
$uf->union(3,4);

var_dump($uf->find(0));
var_dump($uf->find(1));
var_dump($uf->find(2));

?>