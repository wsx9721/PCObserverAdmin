<?php
namespace app;

date_default_timezone_set('PRC');

header('Content-Type: application/json');
header('Content-Type: text/html;charset=utf-8');
$mode = $_GET["mode"];
$file = fopen("config_log.txt","a+");
fwrite($file,date('Y-m-d H:i:s')."\r\n".
    $mode."\r\n"
);
fclose($file);