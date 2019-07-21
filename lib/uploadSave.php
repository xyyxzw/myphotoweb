<?php
//包含连接数据库的公共文件
require_once("./conn.php");

//开启SESSION会话
session_start();
//判断用户是否登录
if(empty($_SESSION['username']))
{
	//如果用户没有登录，则直接跳转到login.php
	header("location:../login.php"); 
	die();
}

//判断表单的来源是否合法
if(isset($_POST['token']) && $_POST['token']==$_SESSION['token'])
{
	//**********************上传图片*******************************
	//(1)判断上传图片是否有错误发生
	if($_FILES['uploadFile']['error']!=0)
	{
		echo "<h2>上传图片有错误发生！</h2>";
		header("refresh:3;url=./upload.php");
		die();
	}

	//(2)判断上传文件内容类型是不是图片
	$arr1 = array("image/jpeg","image/png","image/gif");
	//创建finfo的资源：获取文件内容类型，与扩展名无关
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	//获取文件内容的原始类型，不会随着扩展名改名而改变
	$mime = finfo_file($finfo,$_FILES['uploadFile']['tmp_name']);
	if(!in_array($mime,$arr1))
	{
		echo "<h2>上传的必须是图像！</h2>";
		header("refresh:3;url=./upload.php");
		die();		
	}

	//(3)判断上传的文件扩展名是不是图片
	$arr2 = array("jpg","gif","png");
	$ext  = pathinfo($_FILES['uploadFile']['name'],PATHINFO_EXTENSION); //文件扩展名
	if(!in_array($ext,$arr2))
	{
		echo "<h2>上传的必须是图像！</h2>";
		header("refresh:3;url=./upload.php");
		die();		
	}

	//(4)移动图片到 images目录中
	$tmp_name = $_FILES['uploadFile']['tmp_name'];
	$dst_name = "../images/".uniqid().".".$ext;
	move_uploaded_file($tmp_name,$dst_name);

	//***********************将表单提交数据保存到数据库****************************
	//(1)获取表单提交数据
	$title	= $_POST['title'];
	$intro 	= $_POST['intro'];
	$imgsrc = $dst_name; //将图片路径保存到数据库
	$addate = time();
	$userid=$_SESSION['userid'];

	//(2)判断记录是否添加成功
	$sql = "INSERT INTO myphotoweb_photos VALUES(null,'$userid','$title','$imgsrc','$intro',0,$addate)";
	if(mysqli_query($link, $sql))
	{
		echo "<h2>上传照片成功！</h2>";
		header("refresh:3;url=../index.php");
		die();				
	}
}else
{
	//直接跳转到index.php页面
	header("location:../index.php");
}