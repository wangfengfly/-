<?php
/**
 * Created by PhpStorm.
 * User: aleser
 * Date: 2017/11/8
 * Time: 17:23
 */

interface Internet{
    public function connectTo($host);
}

class RealInternet implements Internet{
    public function connectTo($host){
        echo "Connecting to $host.\n";
    }
}

class ProxyInternet implements Internet{
    private $internet;
    private static $bannedSites = array('abc.com', 'def.com', 'ijk.com', 'lnm.com');

    public function __construct(){
        $this->internet = new RealInternet();
    }

    public function connectTo($host){
        if(in_array($host, self::$bannedSites)){
            echo "access denied\n";
            return;
        }
        $this->internet->connectTo($host);
    }
}

$internet = new ProxyInternet();
$internet->connectTo("baidu.com");
$internet->connectTo("abc.com");
