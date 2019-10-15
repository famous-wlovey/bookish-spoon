
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
	$ziduan = $_GET["ziduan"];//字段

	$sql = $link->query("select 三级分类,字段,头部字段 from ziduan where 三级分类 ='{$ziduan}'");
	$rows=mysqli_fetch_assoc($sql);
	if ($rows>0) {
		echo '三级分类：'.$rows['三级分类'] . '<br>'. '字段（至少满足4个）：'. $rows['字段']. '<br>'. '头部字段（必须满足1个）：'. $rows['头部字段'];
		//print_r($rows);
	}
	else {

		echo "<script type='text/javascript'>alert('输入内容不符合字段要求，请正确输入三级分类名称！');window.history.back(-1);</script>";

	}
?>
