<?php

/**
 * Author: wangfeng
 * Date: 2018/4/16
 * Time: 18:49
 * 栈实现fsm
 */

class Game{
    public $leaf;
    public $mouse;
    public $home;

    public function __construct(){
        $this->leaf = new Leaf(1, 1);
        $this->mouse = new Mouse(2, 2);
        $this->home = new Home(3, 4);
    }

}

class Base{
    public $pos;

    public function __construct($posx, $posy){
        $this->pos = array($posx, $posy);
    }
}

class Leaf extends Base{

}

class Mouse extends Base{

}

class Home extends Base{

}

class FSM {

    private $states;

    public function __construct(){
        $this->states = array();
    }

    public function pushState($state){
        array_push($this->states, $state);
    }

    public function popState(){
        return array_pop($this->states);
    }

    public function update(){
        if(count($this->states) > 0){
            $current = $this->states[count($this->states)-1];
            call_user_func($current);
        }
    }

}


class Ant {
    private $pos;
    private $vel;
    private $fsm;

    public function __construct($posX, $posY){
        $this->pos = array($posX, $posY);
        $this->vel = array(0, 0);
        $this->fsm = new FSM();
        $this->fsm->pushState(array($this, 'findLeaf'));
    }

    private function distance($x1, $y1, $x2, $y2){
        return sqrt(($x2-$x1)*($x2-$x1) + ($y2-$y1)*($y2-$y1));
    }

   public function findLeaf(){
       echo 'findLeaf'.PHP_EOL;
       global $game;
        $leaf = $game->leaf;
        if($this->distance($leaf->pos[0], $leaf->pos[1], $this->pos[0], $this->pos[1]) < 10){
            $this->fsm->popState();
            $this->fsm->pushState(array($this, 'goHome'));
        }

        $mouse = $game->mouse;
        if($this->distance($mouse->pos[0], $mouse->pos[1], $this->pos[0], $this->pos[1]) < 10){
            $this->fsm->pushState(array($this, 'runAway'));
        }
   }

    public function goHome(){
        echo 'goHome'.PHP_EOL;
        global $game;
        $mouse = $game->mouse;
        if($this->distance($mouse->pos[0], $mouse->pos[1], $this->pos[0], $this->pos[1]) < 10){
            $this->fsm->pushState(array($this, 'runAway'));
        }

        $home = $game->home;
        if($this->distance($home->pos[0], $home->pos[1], $this->pos[0], $this->pos[1]) < 10){
            $this->fsm->popState();
            $this->fsm->pushState(array($this, 'findLeaf'));
        }

    }

    public function runAway(){
        echo 'runAway'.PHP_EOL;
        global $game;
        $mouse = $game->mouse;
        $mouse->pos = array(10,10);
        if($this->distance($mouse->pos[0], $mouse->pos[1], $this->pos[0], $this->pos[1]) >= 10){
            $this->fsm->popState();
        }
    }

    public function update(){
        $this->fsm->update();
    }


}

$game = new Game();
$ant = new Ant(0, 0);
$ant->update();

$ant->update();
$ant->update();
$ant->update();
$ant->update();