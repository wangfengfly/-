<?php
/*
 * 并查集
 * O(lgn)
 */
class Node{
    public $i;
    public $parent;
    public $rank;

    public function __construct($i)
    {
        $this->i = $i;
        $this->parent = $i;
        $this->rank = 0;
    }
}

class UnionFindRank{
    private $nodes;

    public function __construct($n)
    {
        for($i=0; $i<$n; $i++){
            $this->nodes[$i] = new Node($i);
        }
    }

    public function find($x){
        if($this->nodes[$x]->parent == $x){
            return $x;
        }
        $this->nodes[$x]->parent = $this->find($this->nodes[$x]->parent);
        return $this->nodes[$x]->parent;
    }

    public function union($x, $y){
        $px = $this->find($x);
        $py = $this->find($y);
        if($this->nodes[$px]->rank < $this->nodes[$py]->rank){
            $this->nodes[$px]->parent = $py;
        }else if($this->nodes[$px]->rank > $this->nodes[$py]->rank){
            $this->nodes[$py]->parent = $px;
        }else{
            $this->nodes[$px]->parent = $py;
            $this->nodes[$py]->rank += 1;
        }
    }

    public function printNodes(){
        var_dump($this->nodes);
    }
}

$uf = new UnionFindRank(5);
$uf->union(0,1);
$uf->union(2,3);
$uf->union(1,2);
//union合并的时候会by rank
$uf->union(3,4);
$uf->printNodes();
//find的时候会进行树高度的压缩
$uf->find(0);
$uf->printNodes();
?>