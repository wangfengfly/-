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

    private function printPath(array $pre, $to){
        echo $to.' ';
        $i = $pre[$to];
        while($i!==null){
            echo $i.' ';
            $i = $pre[$i];
        }

    }

    /*
     * 打印出从from到to的第一条路径
     */
    public function firstBFS($from, $to){
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
        $pre = array();//前一个节点
        $visited[$from] = true;
        $pre[$from] = null;
        foreach($this->adjcent[$from] as $_item){
            $pre[$_item] = $from;
        }

        for($i=0; $i<$len; $i++){
            $cur = $adjs[$i];
            if($visited[$cur] == null){
                $visited[$cur] = true;
                if($cur == $to){
                    $this->printPath($pre, $to);
                    return;
                }
                $adjs = array_merge($adjs, $this->adjcent[$cur]);
                foreach($this->adjcent[$cur] as $_item){
                    //第一条路径
                    if($pre[$_item]==null && $visited[$_item]!=true) {
                        $pre[$_item] = $cur;
                    }
                }
                unset($adjs[$i]);
                $len = count($adjs);
            }
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
$g->firstBFS(0,5);