<!--输出首页长banner-->
<div class="longbanner">
<?php echo "<img src='".base_url()."image/longbanner.gif'>"; ?><!--首页长banner-->
</div>
<br>

<!--获取客户端网页可见宽度，并按分辨率计算屏幕展示广告的行列数-->
<div style="position:relative;top:-1%; text-align:center">
<?php	
	if(!$_GET["width"]) {
	echo '<script>location=location.href+"?width="+document.body.clientWidth+"&height="+document.body.clientHeight;</script>
	';
	exit;
	}
	$width=$_GET['width']; 
	$height=$_GET['height'];
	//获取广告图片尺寸，image_size[0]为宽，image_size[1]为高
	$image_size=getimagesize(base_url()."image/ad/0.gif");
	//计算网页宽度可容纳多少列广告
	$row=floor($width/$image_size[0]);	
	//计算网页高度可容纳多少行广告
	$line=floor(($height-30)/$image_size[1]);
	for($i=1; $i<$line; $i++)
	{
		for($j=1; $j<=$row; $j++)
		{
			$str=base_url()."image/ad/".mt_rand (0 ,$adqt-1).".gif";
			echo "<img src=".$str.">";
		}
		echo "<br>";
	}
?>	
</div>

