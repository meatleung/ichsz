﻿<!--输出首页长banner-->
<div class="longbanner">
<?php echo "<img src='".base_url()."image/longbanner.gif'>"; ?><!--首页长banner-->
</div>

<!--由控制器获取客户端网页可见宽度，并按分辨率计算屏幕展示广告的行列数-->
<center>
<?php	
	for($i=1; $i<=$line; $i++)
	{
		for($j=1; $j<=$row; $j++)
		{
			$k=($i-1)*$row+$j-1;
			echo "<img src=".$ad[0][$k]." alt=\"".$ad[1][$k]."\" />"; 
		}
		echo "<br>";
	}

echo "<input name='fresh' type='image' src='".base_url()."image/fresh.jpg' onclick='location.reload()'>";//刷新按钮
?>
</center>

