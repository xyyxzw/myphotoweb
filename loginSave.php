<?php

/**
 * @Author: xyyx
 * @Date:   2019-07-20 16:37:41
 * @Last Modified by:   xyyx
 * @Last Modified time: 2019-07-21 16:31:32
 */
//包含连接数据库的公共文件
require_once("./lib/conn.php");
//开启SESSION会话
session_start();

//判断表单是否合法提交
if(isset($_POST['token']) && $_POST['token']==$_SESSION['token'])
{
	//获取表单提交数据
	$username = $_POST['username']; //用户名
	$password = md5($_POST['password']); //加密字符串
	$verify	  = $_POST['verify']; //验证码

	//判断验证码与服务器保存的是否一致：验证码不区分大小写
	if(strtolower($verify) != $_SESSION['captcha'])
	{
		echo "<h2>输入的验证码不一致！</h2>";
		header("refresh:3;url=./login.php");//history.back
		die();
	}
    // die;
	//判断用户名和密码与数据库是否一致
	$sql = "SELECT * FROM myphotoweb_user WHERE username='$username' and password='$password'";
	$result = mysqli_query($link, $sql); //执行SQL语句，并返回结果集对象
	$arr=mysqli_fetch_assoc($result);
	$records = mysqli_num_rows($result); //取回记录数：0没找到，1找到了
	if(!$records)
	{
		echo "<h2>用户名或密码不正确！</h2>";
		header("refresh:3;url=./login.php");
		die();
	}

	//保存用户信息到SESSION中
	// echo $userid=$arr['user_id'];die;
	$_SESSION['userid']=$arr['user_id'];
	$_SESSION['username'] = $username;

	//跳转到相册首页
	header("location:./index.php");
}else
{
	//直接跳转到login.php
	header("location:./login.php");
}