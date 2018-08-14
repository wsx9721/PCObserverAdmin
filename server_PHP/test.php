<?php
namespace app;


date_default_timezone_set('PRC');

$mode = [
    0 => 'blacklist_mode',
    1 => 'whitelist_mode'
];

$cur_mode = file_get_contents('config_cur.txt');
if(+strcmp($cur_mode,'blacklist_mode') === 0) {//blacklist_mode
    $file = fopen("black_log.txt","a+");
    fwrite($file,date('Y-m-d H:i:s')."\r\n".
        $_POST["hostname"]."\r\n".
        $_POST["ip"]."\r\n".
        $_POST["guid"]."\r\n".
        $_POST["s"]."\r\n"
    );
    fclose($file);

    $list_file = fopen("list_cur.txt","a+");
    fwrite($list_file,date('Y-m-d H:i:s')."\r\n".
        $_POST["hostname"]."\r\n".
        $_POST["ip"]."\r\n".
        $_POST["guid"]."\r\n".
        $_POST["s"]."\r\n"
    );
    fclose($list_file);
}
else {//whitelist_mode
    $file = fopen("white_log.txt","a+");
    fwrite($file,date('Y-m-d H:i:s')."\r\n".
        $_POST["hostname"]."\r\n".
        $_POST["ip"]."\r\n".
        $_POST["guid"]."\r\n".
        $_POST["s"]."\r\n"
    );
    fclose($file);

    $list_file = fopen("list_cur.txt","a+");
    fwrite($list_file,date('Y-m-d H:i:s')."\r\n".
        $_POST["hostname"]."\r\n".
        $_POST["ip"]."\r\n".
        $_POST["guid"]."\r\n".
        $_POST["s"]."\r\n"
    );
    fclose($list_file);
}


