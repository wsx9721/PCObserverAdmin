<?php

dete_default_timezone_set('PRC');

header('Content-Type: application/json');
header('Content-Type: text/html;charset=utf-8');
$mode = $_GET['mode'];
// $file = fopen('config_cur.txt',"w+");
// fwrite($file,$mode);
// fclose($file);
// echo $mode;
// $list_file = fopen('list_cur.txt','w+');
// fwrite($list_file,date('Y-m-d H:i:s')."\r\n".
//     $mode."\r\n"
// );
// fclose($list_file);

$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis->set('cur_mode',$mode);