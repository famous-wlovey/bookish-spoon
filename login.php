<?php
//开启Session
session_start();
header("Content-type:text/html;charset=utf-8");
error_reporting(E_ALL &~ E_NOTICE);     //屏蔽错误信息
$link = mysqli_connect('localhost','root','loveyang999!','test');
if (!$link) {
    die("连接失败:".mysqli_connect_error());
}

//接受提交过来的用户名及密码
$username = $_POST["username"];//用户名
$password = $_POST["password"];//密码
$code = $_POST["code"]; //验证码
if($username == "")
{
    //echo "请填写用户名<br>";
    echo"<script type='text/javascript'>alert('请填写用户名');window.history.back(-1); </script>";
}
if($password == "")
{
    //echo "请填写密码<br><a href='login.html'>返回</a>";
    echo"<script type='text/javascript'>alert('请填写密码');window.history.back(-1);</script>";
}
if($code != $_SESSION['authcode']) //判断填写的验证码是否与验证码PHP文件生成的信息匹配
{
    echo "<script type='text/javascript'>alert('验证码错误!');window.history.back(-1);</script>";
}
//$sql = "select * from login";
$sql = $link->query("select username from login where username ='{$username}' and password = '{$password}'");
$rows=mysqli_fetch_assoc($sql);
//$dbusername=null;
//$dbpassword=null;
//while ($rows = mysqli_fetch_array($result)) {
	//$dbusername = $rows["username"];
	//$dbpassword = $rows["password"];

//	printf ("%s : %s",$rows["username"],$rows["password"]);}
	if ($rows>0) {
		//拿着提交过来的用户名和密码去数据库查找，看是否存在此用户名以及其密码
		//if ($username == $dbusername && $password == $dbpassword) {
			//echo "验证成功！<br>";
			echo "<script type='text/javascript'>alert('登陆成功');window.location.href='gouwuche.html';</script>";
		}
	else {
			//始终有个bug,循环查找数据出现问题，当密码错误时无法显示网页。初学php，mysql技术不达标，期待修复优化---以优化完成
			//echo "用户名或者密码错误<br>";
			echo "<script type='text/javascript'>alert('用户名或者密码错误');location='login.html';</script>";
			//echo "<a href='login.html'>返回</a>";
		}
	//}
//}
?>