<!--输出首页长banner-->
<div class="longbanner">
<?php echo "<img src='".base_url()."image/longbanner.gif'>"; ?><!--首页长banner-->
</div>
<br>
<center>
<table class="hovertable">
<tr>
	<th>广告位置</th><th>预期展示效果</th><th>收费标准</th>
</tr>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td><center>非首行</center></td><td><center>从所有免费广告中随机抽取，效果一般</center></td><td><center>0元/月</center></td>
</tr>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td><center>固定首行</center></td><td><center>固定在第一行,与免费广告相比位置更好，并且展示次数有保证</center></td><td><center><?php echo anchor('contactus', '详询客服');?></center></td>
</tr>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
</table>
</center>
<div class="longbanner">
<?php echo "<img src='".base_url()."image/adservice.jpg'>"; ?><!--广告位置说明banner-->
</div>