<!--输出首页长banner-->
<div class="longbanner">
<?php echo "<img src='".base_url()."image/longbanner.gif'>"; ?><!--首页长banner-->
</div>
<br>

<!--获取客户端网页可见宽度，并按分辨率计算屏幕展示广告行列数-->
<div style="position:relative;top:-1%; text-align:center">
<?php	
	if(!$_GET["width"]) {
	echo '<script>location=location.href+"?width="+document.body.clientWidth+"&height="+document.body.clientHeight;</script>
	';
	exit;
	}
	$width=$_GET['width']; 
	$height=$_GET['height'];
	$row=floor($width/360);	//计算网页宽度可容纳多少列广告，默认广告宽度为360
	$line=floor(($height-30)/190);	//计算网页高度可容纳多少行广告，默认广告高度为190
	for($i=1; $i<$line; $i++)
		{
			for($j=1; $j<=$row; $j++)
			{
				$str=base_url()."image/ad/".mt_rand (0 ,40).".gif";
				echo "<img src=".$str.">";
			}
			echo "<br>";
		}
?>	
</div>
