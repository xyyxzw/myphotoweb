<?php
//(1)数据库配置信息
$db_host = "localhost"; //主机名
$db_user = "root"; //用户名
$db_pass = "123"; //密码
$db_name = "test1"; //数据库名称
$charset = "utf8"; //字符集

//(2)PHP连接MySQL服务器
if(!$link = @mysqli_connect($db_host, $db_user, $db_pass))
{
	echo "<h2>PHP连接MySQL服务器失败！</h2>";
	die(); //中止程序向下运行
}

//(3)选择当前数据库
if(!mysqli_select_db($link, $db_name))
{
	echo "<h2>选择数据库{$db_name}失败！</h2>";
	die();
}

//(4)设置字符集
mysqli_set_charset($link, $charset);
