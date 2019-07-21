<?php

/**
 * @Author: ASUS
 * @Date:   2019-07-18 20:04:16
 * @Last Modified by:   xyyx
 * @Last Modified time: 2019-07-20 16:31:21
 */
//开启SESSION会话
session_start();
//产生表单验证随机字符串
$_SESSION['token'] = uniqid();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户登录</title>
	<link rel="stylesheet" href="./css/reset.css">
	<style type="text/css">
	/*全局样式*/
	body,h2,form,a{margin:0px;padding:0px}
	body{font-size:14px;color:#444;background-color:#00343f;}
	a{text-decoration:none;color:#444;}
	a:hover{color:red;} 
	/*局部样式*/
	.box{width:1000px;margin:0px auto;background-color:white;}
	.title{
	text-align:center;
	padding: 10px 0px;
	border-bottom: 2px solid #444;
	background-color:#d0e9ff;
	}
	.title h2{font-size:36px;padding:10px;}
	form{padding:30px;height:400px;}
	form td{padding:8px;}
	</style>
</head>
<body>
	<div class="box">
<!--title-->
<div class="title">
	<h2>用户登录</h2>
	<a href="javascript:void(0)">欢迎光临，请先登录！</a>
</div><!--//title-->
<!--form-->
<form method="post" action="loginSave.php">
<table align="center" width="400">
	<tr>
		<td width="100" align="right">用户名：</td>
		<td><input type="text" name="username"></td>
	</tr>
	<tr>
		<td align="right">密&nbsp;&nbsp;&nbsp;码：</td><!--对齐一个汉字3个字节 用3个&nbsp;代替-->
		<td><input type="password" name="password"></td><!--input标签是行内块元素不能换行显示 用td表格，或者不用表格，用<br>换行或者<p><input></p>-->
	</tr>
	<tr>
		<td align="right">验证码：</td>
		<td>
			<input style="float:left;" type="text" name="verify" size="4" maxlength="4">
			<img style="float:left;margin-left:10px;cursor: pointer;height:22px;" src="./lib/captcha.php" onClick="this.src='./lib/captcha.php?'+Math.random()" id="captcha">
			<a href="javascript:;" onclick="document.getElementById('captcha').src='./lib/captcha.php?r='+Math.random()">换一个?</a>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" value="登录">
			<input type="hidden" name="token" value="<?php echo $_SESSION['token']?>">
			<input type="reset" value="重置">
		</td>
	</tr>
</table>
</form><!--//form-->
</div><!--//box-->
<!--1<input type="text"><br>
2<input type="text">-->
</body>
</html>
