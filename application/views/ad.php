<!--输出首页长banner-->
<div class="longbanner">
<?php echo "<img src='".base_url()."image/longbanner.gif'>"; ?><!--首页长banner-->
</div>
<br>

<!--由控制器获取客户端网页可见宽度，并按分辨率计算屏幕展示广告的行列数，将结果传递过来-->
<div style="position:relative;top:-1%; text-align:center">
<?php	
	for($i=1; $i<$line; $i++)
	{
		for($j=1; $j<=$row; $j++)
		{
			$k=($i-1)*$row+$j-1;
			$adadd=base_url()."image/ad/".$ad[0][$k].".gif";
			echo "<img src=".$adadd." alt=\"".$ad[1][$k]."\" />"; 
		}
		echo "<br>";
	}

echo "<input name='fresh' type='image' src='".base_url()."image/fresh.jpg' onclick='location.reload()'>";//刷新按钮
?>
</div>

