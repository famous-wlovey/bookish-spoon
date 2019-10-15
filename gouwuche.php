<!DOCTYPE html>
<html lang="en">
<head>
	<title>购物车</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	
	<!--清除浏览器中的缓存-->
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Expires" content="0">

<!-- 612wjw.club Baidu tongji analytics -->
<script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
hm.src = "https://hm.baidu.com/hm.js?60adccec1072e9d294e54d7933800d4d";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hm, s);
})();
</script>

</head>
<body class="container">
<?php
	session_start();
	header("Content-type:text/html;charset=utf-8");
	$link = mysqli_connect('localhost','root','loveyang999!','test');
	if (!$link) {
		die("连接失败:".mysqli_connect_error());
	}
	$items=array();
	$i = 0;
	$sql=$link->query("select * from gouwuche");
	
	echo
	"<table id=\"cartTable\"  class=\"cart table table-condensed\">
	<thead>
	<tr>
		<th style=\"width:60px;\"><label><input class=\"check-all check\" type=\"checkbox\" /> 全选</label></th>
		<th><label>鲜花类别</label></th>
		<th style=\"width:100px;\"><label>单价</label></th>
		<th style=\"width:120px;\"><label>数量</label></th>
		<th style=\"width:100px;\"><label>小计</label></th>
		<th style=\"width:40px;\"><label>操作</label></th>
	</tr>
	</thead>
	<tbody>";
	while ($rows = mysqli_fetch_assoc($sql)){
		$items[$i]['id'] = $rows['Id'];
		$items[$i]['item'] = $rows['item'];
		$items[$i]['price'] = $rows['price'];

		echo
		"<tr>
		<td >
			<input class=\"check-one check\" type=\"checkbox\" />
		</td>
		<td class=\"goods\">
			<label>";
		
		echo $items[$i]['item'];
		
		echo "</label>
		</td>
		<td class=\"number small-bold-red\">
			<span>";
		
		echo $items[$i]['price'];
		
		echo "</span>
		</td>
		<td class=\"input-group\">
			<span class=\"input-group-addon minus\">-</span>
			<input type=\"text\" class=\"number form-control input-sm\" id=\"shuliang\" name=\"shuliang\" value=\"1\" />
			<span class=\"input-group-addon plus\">+</span>
		</td>
		<td class=\"subtotal number small-bold-red\">";
		
		echo $items[$i]['price'];
		
		echo "</td>
		<td class=\"operation\"><span class=\"delete btn btn-xs btn-primary\">删除</span></td>
	</tr>";
		$i++;
	}
	
	echo
	"<div class=\"row\">
	<div class=\"col-md-12 col-lg-12 col-sm-12\">
		<div style=\"border-top:1px solid gray;padding:4px 10px;\">
			<div style=\"margin-left:20px;\" class=\"pull-right total\">
				<label>金额合计:<span class=\"currency\">￥</span><span id=\"priceTotal\" class=\"large-bold-red\">0.00</span></label>
			</div>
			<div class=\"pull-right\">
				<label>您选择了<span id=\"itemCount\" class=\"large-bold-red\" style=\"margin:0 4px;\">0</span>种类别的鲜花，共计<span id=\"qtyCount\" class=\"large-bold-red\" style=\"margin:0 4px;\">0</span>件</label>
			</div>
			<div class=\"pull-right selected\" id=\"selected\">
				<span id=\"selectedTotal\"></span>
			</div>
		</div>
	</div>
</div>
<footer class=\"text-center modal-footer\">
	<div class=\"container\">
		<div class=\"row\">
			<div class=\"col-12\">
				<p>
				<div class=\"text-center\">
					<input type=\"button\" class=\"btn btn-primary\" value=\"点击留言\" onclick=\"window.open('liuyanban.html')\">
				</div>
				</p>
				<p>Copyright © 2019-5 &nbsp; <a href=\"http://www.612wjw.club\">时尚花都</a> &nbsp;版权所有|<a href=\"http://www.beian.miit.gov.cn/\">豫ICP备18038153号-1</a></p>
			</div>
		</div>
	</div>
</footer>
<script src=\"js/jquery-3.2.1.min.js\"></script>
<script src=\"js/popper.min.js\"></script>
<script src=\"js/bootstrap-4.0.0.js\"></script>";
?>
</body>
</html>