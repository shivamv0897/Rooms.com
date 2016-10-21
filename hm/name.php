<?php
function get_name($file_name) {
    $str = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890";
    $str = str_shuffle($str);
    $str = substr($str, 1, 10);
    $i = strpos($file_name, '.');
    $ext_name = substr($file_name, $i);
    return $str.$ext_name;
}?>
