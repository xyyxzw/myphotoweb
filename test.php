<?php

/**
 * @Author: xyyx
 * @Date:   2019-07-20 20:47:08
 * @Last Modified by:   xyyx
 * @Last Modified time: 2019-07-21 15:03:45
 */
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
	echo "<h2>选择数据库{$db_name}失败！</h2>".mysqli_error($link).mysqli_errno($link);
	die();
}

//(4)设置字符集
mysqli_set_charset($link, $charset);
$sql = "SELECT * FROM user";
$result = mysqli_query($link, $sql);
// $arrs = mysqli_fetch_all($result,MYSQLI_ASSOC);
// print_r($arrs);
// foreach ($arrs as $key => $value) {
// 	print_r($value);
// 	echo $value['username'];
// 	# code...
// }

// while($row = mysqli_fetch_assoc($result)) {
// 		echo $row['username'];
// 		print_r($row);
// 	}

$data=[];
while($row = mysqli_fetch_assoc($result)) {
		$data[]=$row;
	}
// print_r($data);
foreach ($data as $key => $value) {
print_r($value);
echo $value['username'];
}
//mysqli_fetch_assoc($result) 如果是多行，真正拿到的是多行数据的最后一条记录
echo mysqli_fetch_assoc($result)['username'];//获取多行结果集里面的最后一个里面的username字段数据
echo mysqli_fetch_row($result)[1];//获取多行结果集里面的最后一个里面的第二字段个数据

$sql = "SELECT * FROM user where username='我的'";//如果是一行，取第三个字段的值
$result = mysqli_query($link, $sql);
echo mysqli_fetch_row($result)[2]."一行";


$sql = "SELECT count(*) FROM user";
$result = mysqli_query($link, $sql);
echo mysqli_fetch_row($result)[0];//这种的只能row，因为不知道count(*)是什么名字 或者可以SELECT count(*) as total FROM user

$sql = "SELECT count(*) AS total FROM user";
$result = mysqli_query($link, $sql);
echo mysqli_fetch_assoc($result)['total']."assoc";

$sql = "SELECT * FROM user";
$result = mysqli_query($link, $sql);
echo mysqli_num_rows($result)."haha";

$sql = "SELECT * FROM user";
$result = mysqli_query($link, $sql);
// echo mysqli_fetch_all($result,MYSQLI_ASSOC)[1]['username']."\n\t";
// echo mysqli_fetch_all($result,MYSQLI_NUM)[1][1]."\n\t";die;
// echo mysqli_fetch_all($result)[1][1]."\n\t";die;
// echo mysqli_fetch_all($result)[1]['username']."\n\t";die;//这样的不行


// $sql = "SELECT * FROM user";
// $result = mysqli_query($link, $sql);
// $num=mysqli_num_rows($result);
// for ($i=0; $i <$num ; $i++) { 
// 	  $row=mysqli_fetch_assoc($result);
// 	  print_r($row);
// }
// foreach ($row as $key => $value) {
// 	echo $value;//这样取得的是最后一条数据的数组的值，不是整个，因此必须将其设为二维数组
// }
echo "11111111111111111111111111111111111111111111111111111";
$sql = "SELECT * FROM user";
$result = mysqli_query($link, $sql);
$num=mysqli_num_rows($result);
$row=[];
for ($i=0; $i <$num ; $i++) { 
	  array_push($row,mysqli_fetch_assoc($result));
	 
}
 print_r($row);
foreach ($row as $key => $value) {
	echo $value['username'];
}


