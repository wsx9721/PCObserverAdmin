<?php

date_default_timezone_set('PRC');

$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$mode = $redis->hget('cur_mode','mode');

$redis->hset('stdlog_'.$_POST['guid'],'mode',$mode);
$redis->hset('stdlog_'.$_POST['guid'],'time',date('Y-m-d H:i:s'));
$redis->hset('stdlog_'.$_POST['guid'],'ip',$_POST['ip']);
$redis->hset('stdlog_'.$_POST['guid'],'hostname',$_POST['hostname']);
$redis->hset('stdlog_'.$_POST['guid'],'content',$_POST['s']);

if(!$redis->sismember('logs','stdlog_'.$_POST['guid'])) {
    $redis->sadd('logs','stdlog_'.$_POST['guid']);
}
