<?php
/**
 * Author: wangfeng
 * Date: 2019/4/2
 * Time: 10:03
 * 发布订阅模式，解耦发布者和订阅者，pubsub作为中间人
 */

abstract class Publisher{
    abstract public function send(PubSub $pubsub, $topic, $msg);
}

class PublisherImpl extends Publisher{
    public function send(PubSub $pubsub, $topic, $msg){
        $pubsub->push($topic, $msg);
    }
}

abstract class Subscriber{
    abstract public function run(array $msg);
}

class SubscriberImpl extends Subscriber{
    public function run(array $msg){
        var_dump($msg);
    }
}

class PubSub{
    const NOTIFY_THRESHOLD = 2;

    private $subscribers;
    private $topics;

    public function __construct(){
        $this->subscribers = [];
        $this->topics = [];
    }

    public function push($topic, $msg){
        $this->topics[$topic][] = $msg;
        if(count($this->topics[$topic]) >= self::NOTIFY_THRESHOLD){
            $this->notify($topic);
        }
    }

    public function __destruct(){
        foreach($this->topics as $topic=>$msg){
            if($msg) {
                $this->notify($topic);
            }
        }
    }

    public function addSub(string $topic, Subscriber $subscriber){
        $this->subscribers[$topic][] = $subscriber;
    }

    public function rmSub(string $topic, Subscriber $subscriber){
        foreach($this->subscribers[$topic] as $i=>$_sub){
                if ($_sub === $subscriber) {
                    unset($this->subscribers[$topic][$i]);
                }
        }
    }

    public function notify($topic){
        foreach($this->subscribers[$topic] as $subscriber){
            $msg = $this->topics[$topic];
            $this->topics[$topic] = [];
            $subscriber->run($msg);
        }
    }
}

$pubsub = new PubSub();

$sub1 = new SubscriberImpl();
$sub2 = new SubscriberImpl();
$pubsub->addSub('topic-a', $sub1);
$pubsub->addSub('topic-b', $sub2);

$publisher = new PublisherImpl();
$publisher->send($pubsub, 'topic-a', 'topic-a-msg1');
$publisher->send($pubsub, 'topic-a', 'topic-a-msg2');
$pubsub->rmSub('topic-b', $sub2);
$publisher->send($pubsub, 'topic-b', 'topic-b-msg1');