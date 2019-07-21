<?php
/*
	图像验证码：
	(1)产生随机验证码字符串
	(2)创建空画布，并分配颜色
	(3)绘制带填充的矩形
	(4)绘制像素点
	(5)绘制线段
	(6)写入一行TTF字符串
	(7)输出图像，并销毁图像
 */

//(1)产生4位随机验证码字符串
$arr1 = array_merge(range('a','z'),range(0,9),range('A','Z'));
shuffle($arr1);
$arr2 = array_rand($arr1,4);
$str = "";
foreach($arr2 as $index)
{
	$str .= $arr1[$index];
}
//将验证码字符串保存到SESSION中
session_start();
$_SESSION['captcha'] = strtolower($str);

//(2)创建空画布
$width = 70;
$height = 22;
$img = imagecreatetruecolor(70,22);

//(3)绘制带填充的矩形
$color1 = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
imagefilledrectangle($img,0,0,$width,$height,$color1);

//(4)绘制像素点
for($i=1;$i<=100;$i++)
{
	$color2 = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$color2);
}

//(5)绘制线段
for($i=1;$i<=10;$i++)
{
	$color3 = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$color3);
}

//(6)绘制一行TTF字符串
// $fontfile = "D:/wamp/apache/htdocs/myphotoweb/images/msyh.ttf";
$fontfile=realpath('../images/msyh.ttf');
$color4 = imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
imagettftext($img,18,0,5,20,$color4,$fontfile,$str);

//(7)输出图像，并销毁图像
header("content-type:image/png");
imagepng($img);
imagedestroy($img);