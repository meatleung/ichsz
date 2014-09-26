<!--输出首页长banner-->
<div class="longbanner">
<?php echo "<img src='image/longbanner.gif'>"; ?><!--首页长banner-->
</div>
<br>

<div style="text-align:center;position:relative;top:-2%;">
<?php
	//从cookie读取客户端网页可见宽度和高度，据此输出广告图片-->
	if(!$_GET["width"]) 
	{
		echo '<script>location = location.href+"?width="+document.body.clientWidth+"&height="+window.screen.availHeight;</script>';
		exit;
	}
	$width = $_GET["width"];
	$height = $_GET["height"];
	$row=floor($width/360);	//计算网页宽度可容纳多少列广告，默认广告宽度为360
	$line=floor(($height-30)/190);	//计算网页高度可容纳多少行广告，默认广告高度为190
	for($i=1; $i<$line; $i++)
	{
		for($j=1; $j<=$row; $j++)
		{
			$str="image/ad/".mt_rand (1 ,40).".gif";
			echo "<img src=".$str.">";
		}
		echo "<br>";
	}
?>	
</div>