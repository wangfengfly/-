<?php
$res = array();

function traverse($file){
    global $res;
    $file = realpath($file);
    if(is_dir($file)){
        chdir($file);
        $files = scandir($file);
        foreach ($files as $_file) {
            if(!in_array($_file, array('.', '..'))) {
                traverse($_file);
            }
        }
        chdir('../');
    }else{
        $res[] = $file;
        return;
    }
}

global $argv;
if(count($argv) < 2){
    echo "Usage: php $argv[0] filename\n";
    exit;
}
traverse($argv[1]);
var_dump($res);
?>