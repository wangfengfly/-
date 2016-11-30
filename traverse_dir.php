
<?php
/*
 * 该算法会产生如下的输出:
 *
 array(5) {
  [0]=>
  string(25) "/home/wangfeng/test/a.txt"
  [1]=>
  string(25) "/home/wangfeng/test/b.txt"
  [2]=>
  string(34) "/home/wangfeng/test/sub_test/c.txt"
  [3]=>
  string(34) "/home/wangfeng/test/sub_test/d.txt"
  [4]=>
  string(45) "/home/wangfeng/test/sub_test/third_test/e.txt"
}
*/
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