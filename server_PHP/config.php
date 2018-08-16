<?php

date_default_timezone_set('PRC');

header('Content-Type: application/json');
header('Content-Type: text/html;charset=utf-8');
// $mode = $_GET["mode"];
$mode = 'blacklist_mode';
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis->hset('cur_mode','mode',$mode);
$redis->hset('cur_mode','time',date('Y-m-d H:i:s'));
