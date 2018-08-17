<?php

date_default_timezone_set('PRC');

$redis = new Redis();
$redis->connect('127.0.0.1',6379);

$guid = $_GET['guid'];
$data = $redis->hGetAll('stdlog_'.$guid);
echo $data['time']."\r\n".$data['content'];