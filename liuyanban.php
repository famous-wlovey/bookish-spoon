<?php
	session_start();
	header("Content-type:text/html;charset=utf-8");
	$link = mysqli_connect('localhost','root','loveyang999!','test');
	if (!$link) {
		die("连接失败:".mysqli_connect_error());
	}
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	
	if(!preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $name)>0){
		echo "<script>alert('姓名最多不超过5位且不含非法字符！请重新填写');window.history.back(-1);</script>";
	}elseif (!preg_match('/^[\w\.]+@\w+\.\w+$/i', $email)) {
		echo "<script>alert('邮箱不合法！重新填写');window.history.back(-1);</script>";
	}elseif (strlen($message) > 216){
		echo "<script>alert('请输入少于70个汉字！');window.history.back(-1); </script>";
	} else{
		$sql= "insert into liuyanban(name,email,message)values('$name','$email','$message')";
		//插入数据库
		if(!(mysqli_query($link,$sql))){
			echo "<script>alert('提交失败，请重新填写！');window.history.back(-1);</script>";
		}else{
			echo "<script>alert('提交成功，请等待工作人员回复！');window.location.href='liuyanban.html';</script>";
		}
	}
?>