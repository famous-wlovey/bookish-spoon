<!DOCTYPE html>
<html lang="en">
<head>
	<title>时尚花都</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	
	<!--清除浏览器中的缓存-->
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Expires" content="0">
</head>
<body>
<div>
	<form action="ziduan.php" method="get">
			<input type="text" id="ziduan" name="ziduan" placeholder="输入必要字段" style="display:inline;width:200px;"autocomplete="off" />
		<button type="submit">查询</button>
	</form>
</div>
<?php
	header("Content-type:text/html;charset=utf-8");
	$sousuo = $_REQUEST['sousuo'];
	$url="https://baike.baidu.com/item/".$sousuo;
	$showdata=file_get_contents($url);
	preg_match('/<dd id="open-tag-item">(.*?)<\/dd>/mis', $showdata, $match11);
	preg_match('/<div class="basic-info cmn-clearfix">(.*?)<\/div>/mis', $showdata, $match22);
	preg_match('/<div class="para" label-module="para">(.*?)<\/div>/mis', $showdata, $match33);
	preg_match_all('/<div class="para" label-module="para">(.*)<\/div>/mis', $showdata, $match44);
	echo "<h3>百度百科</h3><hr>";
	print_r($match11[0]);
	echo "<hr>";
	print_r($match22[0]);
	echo "<hr><h5>摘要</h5>";
	echo "<hr>";
	print_r($match33[0]);
	echo "<hr><br><br><br>";
	
	
	//	$url2="https://baike.sogou.com/v697218.htm?fromTitle=".$sousuo;
	//	$showdata2=file_get_contents($url2);
	//	preg_match('/<div class="relevant_wrap">(.*?)<\/div>/mis', $showdata2, $match33);
	//	preg_match('/<table class="abstract_list">(.*?)<\/table>/mis', $showdata2, $match44);
	//	echo "<h3>搜狗百科</h3><hr>";
	//	print_r($match33[0]);
	//	echo "<hr>";
	//	print_r($match44[0]);
	//	echo "<hr>";
?>
<script src=\"js/jquery-3.2.1.min.js\"></script>
<script src=\"js/popper.min.js\"></script>
<script src=\"js/bootstrap-4.0.0.js\"></script>";
</body>
</html>

