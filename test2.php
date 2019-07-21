<?php
$fontfile = realpath('./index.php');//string(42) "D:\wamp\apache\htdocs\myphotoweb\index.php"
var_dump($fontfile);

$fontfile = realpath('./images/msyh.ttf');// string(48) "D:\wamp\apache\htdocs\myphotoweb\images\msyh.ttf"
var_dump($fontfile);

echo md5('admin');