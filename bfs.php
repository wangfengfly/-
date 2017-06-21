<?php

/**
 * Created by PhpStorm.
 * User: wangfeng211731
 * Date: 2017/6/21
 * Time: 14:07
 */
class bfs{
    private $adjcent;

    public function __construct(){
        $this->adjcent = array();
    }

    public function add($u, $v){
        $this->adjcent[$u][] = $v;
        $this->adjcent[$v][] = $u;

    }
    /*
     * 打印出从from到节点to遍历过程中经过的节点
     */
    public function BFS($from, $to){
        if($from == $to){
            echo $from."\n";
            return;
        }
        $adjs = $this->adjcent[$from];
        $len = count($adjs);
        if($len==0){
            echo "no path.\n";
            return;
        }
        $visited = array();
        echo $from.' ';
        $visited[$from] = true;
        for($i=0; $i<$len; $i++){
            if($adjs[$i] == $to){
                echo $to.' ';
                return;
            }
            if($visited[$adjs[$i]] == null) {
                echo $adjs[$i] . ' ';
                $visited[$adjs[$i]] = true;
            }
            $adjs = array_merge($adjs, $this->adjcent[$adjs[$i]]);
            unset($adjs[$i]);
            $len = count($adjs);
        }
    }

}

$g = new bfs();
$g->add(0,1);
$g->add(0,2);
$g->add(1,3);
$g->add(1,4);
$g->add(2,4);
$g->add(3,5);
var_dump($g);
$g->BFS(0,5);